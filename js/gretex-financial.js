(function (window) {
    'use strict';

    function numberOrZero(value) {
        var n = Number(value);
        return Number.isFinite(n) ? n : 0;
    }

    function round(value) {
        return Math.round((numberOrZero(value) + Number.EPSILON) * 100) / 100;
    }

    function formatCurrency(value) {
        return new Intl.NumberFormat('en-IN', {
            style: 'currency',
            currency: 'INR',
            maximumFractionDigits: 0
        }).format(numberOrZero(value));
    }

    function calcCAGR(initial, finalValue, years) {
        initial = numberOrZero(initial);
        finalValue = numberOrZero(finalValue);
        years = numberOrZero(years);

        if (initial <= 0 || finalValue <= 0 || years <= 0) {
            return 0;
        }

        return (Math.pow(finalValue / initial, 1 / years) - 1) * 100;
    }

    function calcBrokerage(buyPrice, sellPrice, quantity, type) {
        buyPrice = numberOrZero(buyPrice);
        sellPrice = numberOrZero(sellPrice);
        quantity = numberOrZero(quantity);

        var buyValue = buyPrice * quantity;
        var sellValue = sellPrice * quantity;
        var turnover = buyValue + sellValue;
        var brokerage = type === 'percentage'
            ? turnover * 0.0003
            : Math.min(40, turnover * 0.0003);
        var stt = sellValue * 0.001;
        var transactionCharges = turnover * 0.0000325;
        var sebiCharges = turnover * 0.000001;
        var stampDuty = buyValue * 0.00015;
        var gst = (brokerage + transactionCharges) * 0.18;
        var totalCharges = brokerage + stt + transactionCharges + sebiCharges + stampDuty + gst;
        var grossPL = sellValue - buyValue;

        return {
            turnover: round(turnover),
            brokerage: round(brokerage),
            stt: round(stt),
            transactionCharges: round(transactionCharges),
            sebiCharges: round(sebiCharges),
            stampDuty: round(stampDuty),
            gst: round(gst),
            totalCharges: round(totalCharges),
            grossPL: round(grossPL),
            netPL: round(grossPL - totalCharges),
            breakevenPrice: quantity > 0 ? round((buyValue + totalCharges) / quantity) : 0
        };
    }

    function futureValue(amount, annualRate, years, periodsPerYear) {
        amount = numberOrZero(amount);
        annualRate = numberOrZero(annualRate) / 100;
        years = numberOrZero(years);
        periodsPerYear = periodsPerYear || 12;
        return amount * Math.pow(1 + annualRate / periodsPerYear, periodsPerYear * years);
    }

    function calcETF(type, amount, years, rate, expenseRatio, includeTrading) {
        var totalInvestment = type === 'sip' ? numberOrZero(amount) * 12 * numberOrZero(years) : numberOrZero(amount);
        var effectiveRate = Math.max(0, numberOrZero(rate) - numberOrZero(expenseRatio));
        var maturityValue = 0;

        if (type === 'sip') {
            var monthlyRate = effectiveRate / 100 / 12;
            var months = numberOrZero(years) * 12;
            maturityValue = monthlyRate > 0
                ? numberOrZero(amount) * ((Math.pow(1 + monthlyRate, months) - 1) / monthlyRate) * (1 + monthlyRate)
                : totalInvestment;
        } else {
            maturityValue = futureValue(amount, effectiveRate, years, 12);
        }

        var tradingCosts = includeTrading ? totalInvestment * 0.001 : 0;
        maturityValue = Math.max(0, maturityValue - tradingCosts);

        return {
            totalInvestment: round(totalInvestment),
            maturityValue: round(maturityValue),
            totalReturns: round(maturityValue - totalInvestment),
            expenseCost: round(totalInvestment * numberOrZero(expenseRatio) / 100 * numberOrZero(years)),
            tradingCosts: round(tradingCosts)
        };
    }

    function calcMTF(value, marginPercent, rate, days) {
        value = numberOrZero(value);
        var marginRequired = value * numberOrZero(marginPercent) / 100;
        var borrowedAmount = Math.max(0, value - marginRequired);
        var interest = borrowedAmount * numberOrZero(rate) / 100 * numberOrZero(days) / 365;

        return {
            totalValue: round(value),
            marginRequired: round(marginRequired),
            borrowedAmount: round(borrowedAmount),
            interestCost: round(interest),
            dailyInterest: round(interest / Math.max(1, numberOrZero(days))),
            totalCost: round(marginRequired + interest)
        };
    }

    function calcPOFD(amount, years, rate) {
        var maturityValue = futureValue(amount, rate, years, 4);
        return {
            totalInvestment: round(amount),
            maturityValue: round(maturityValue),
            interestEarned: round(maturityValue - numberOrZero(amount))
        };
    }

    function calcPORD(deposit, years, rate) {
        deposit = numberOrZero(deposit);
        var months = numberOrZero(years) * 12;
        var monthlyRate = numberOrZero(rate) / 100 / 12;
        var maturityValue = monthlyRate > 0
            ? deposit * ((Math.pow(1 + monthlyRate, months) - 1) / monthlyRate) * (1 + monthlyRate)
            : deposit * months;
        var totalInvestment = deposit * months;

        return {
            totalInvestment: round(totalInvestment),
            maturityValue: round(maturityValue),
            interestEarned: round(maturityValue - totalInvestment)
        };
    }

    function calcSTCG(buyValue, sellValue, expenses, taxRate) {
        buyValue = numberOrZero(buyValue);
        sellValue = numberOrZero(sellValue);
        expenses = numberOrZero(expenses);
        var gain = sellValue - buyValue - expenses;
        var tax = Math.max(0, gain) * numberOrZero(taxRate) / 100;

        return {
            capitalGain: round(gain),
            taxPayable: round(tax),
            netGain: round(gain - tax)
        };
    }

    function calcPPF(yearlyInvestment, years, rate) {
        yearlyInvestment = numberOrZero(yearlyInvestment);
        years = numberOrZero(years);
        rate = numberOrZero(rate) / 100;
        var maturityValue = 0;

        for (var i = 0; i < years; i += 1) {
            maturityValue = (maturityValue + yearlyInvestment) * (1 + rate);
        }

        var totalInvestment = yearlyInvestment * years;
        return {
            totalInvestment: round(totalInvestment),
            maturityValue: round(maturityValue),
            interestEarned: round(maturityValue - totalInvestment)
        };
    }

    function calcEPF(monthlyBasic, currentAge, retirementAge, openingBalance, salaryIncrement, interestRate, employeePercent, employerPercent) {
        monthlyBasic = numberOrZero(monthlyBasic);
        currentAge = numberOrZero(currentAge);
        retirementAge = numberOrZero(retirementAge);
        openingBalance = numberOrZero(openingBalance);
        salaryIncrement = numberOrZero(salaryIncrement) / 100;
        var monthlyRate = numberOrZero(interestRate) / 100 / 12;
        employeePercent = numberOrZero(employeePercent) / 100;
        employerPercent = numberOrZero(employerPercent) / 100;

        var months = Math.max(0, Math.round((retirementAge - currentAge) * 12));
        var balance = openingBalance;
        var totalInvestment = openingBalance;

        for (var month = 1; month <= months; month += 1) {
            if (month > 1 && (month - 1) % 12 === 0) {
                monthlyBasic *= 1 + salaryIncrement;
            }

            var contribution = monthlyBasic * (employeePercent + employerPercent);
            totalInvestment += contribution;
            balance = (balance + contribution) * (1 + monthlyRate);
        }

        return {
            totalInvestment: round(totalInvestment),
            maturityValue: round(balance),
            interestEarned: round(balance - totalInvestment)
        };
    }

    function calcELSS(amount, years, rate, mode) {
        amount = numberOrZero(amount);
        years = numberOrZero(years);
        rate = numberOrZero(rate);
        mode = mode || 'lumpsum';

        if (mode === 'sip') {
            var months = years * 12;
            var monthlyRate = rate / 100 / 12;
            var maturityValue = monthlyRate > 0
                ? amount * ((Math.pow(1 + monthlyRate, months) - 1) / monthlyRate) * (1 + monthlyRate)
                : amount * months;
            var totalInvestment = amount * months;

            return {
                totalInvestment: round(totalInvestment),
                maturityValue: round(maturityValue),
                interestEarned: round(maturityValue - totalInvestment),
                taxSaving: round(Math.min(totalInvestment, 150000) * 0.3)
            };
        }

        var totalValue = futureValue(amount, rate, years, 12);
        return {
            totalInvestment: round(amount),
            maturityValue: round(totalValue),
            interestEarned: round(totalValue - amount),
            taxSaving: round(Math.min(amount, 150000) * 0.3)
        };
    }

    function calcSSY(yearlyInvestment, depositYears, rate, startYear) {
        yearlyInvestment = numberOrZero(yearlyInvestment);
        depositYears = numberOrZero(depositYears) || 15;
        var maturityYears = 21;
        var annualRate = numberOrZero(rate) / 100;
        var maturityValue = 0;

        for (var year = 1; year <= maturityYears; year += 1) {
            if (year <= depositYears) {
                maturityValue += yearlyInvestment;
            }
            maturityValue *= (1 + annualRate);
        }

        var totalInvestment = yearlyInvestment * depositYears;
        return {
            totalInvestment: round(totalInvestment),
            maturityValue: round(maturityValue),
            interestEarned: round(maturityValue - totalInvestment),
            maturityYear: (Number(startYear) || new Date().getFullYear()) + maturityYears
        };
    }

    function calcStepUpSIP(monthlyInvestment, stepUpPercent, annualRate, years) {
        monthlyInvestment = numberOrZero(monthlyInvestment);
        var months = numberOrZero(years) * 12;
        var monthlyRate = numberOrZero(annualRate) / 100 / 12;
        var totalInvestment = 0;
        var maturityValue = 0;

        for (var month = 1; month <= months; month += 1) {
            if (month > 1 && (month - 1) % 12 === 0) {
                monthlyInvestment *= 1 + numberOrZero(stepUpPercent) / 100;
            }
            totalInvestment += monthlyInvestment;
            maturityValue = (maturityValue + monthlyInvestment) * (1 + monthlyRate);
        }

        return {
            totalInvestment: round(totalInvestment),
            maturityValue: round(maturityValue),
            estimatedReturns: round(maturityValue - totalInvestment),
            totalReturns: round(maturityValue - totalInvestment)
        };
    }

    window.formatCurrency = window.formatCurrency || formatCurrency;
    window.calcCAGR = window.calcCAGR || calcCAGR;
    window.calcBrokerage = window.calcBrokerage || calcBrokerage;
    window.calcETF = window.calcETF || calcETF;
    window.calcMTF = window.calcMTF || calcMTF;
    window.calcPOFD = window.calcPOFD || calcPOFD;
    window.calcPORD = window.calcPORD || calcPORD;
    window.calcSTCG = window.calcSTCG || calcSTCG;
    window.calcPPF = window.calcPPF || calcPPF;
    window.calcEPF = window.calcEPF || calcEPF;
    window.calcELSS = window.calcELSS || calcELSS;
    window.calcSSY = window.calcSSY || calcSSY;
    window.calcStepUpSIP = window.calcStepUpSIP || calcStepUpSIP;
})(window);
