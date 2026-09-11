CREATE TABLE IF NOT EXISTS form_submissions (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    request_id CHAR(32) NOT NULL,
    form_type VARCHAR(64) NOT NULL,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(254) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    message TEXT NOT NULL,
    ip_hash CHAR(64) DEFAULT NULL,
    status ENUM('received', 'processing', 'completed', 'failed', 'spam') NOT NULL DEFAULT 'received',
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY uq_form_submissions_request_id (request_id),
    KEY idx_form_submissions_status_created (status, created_at),
    KEY idx_form_submissions_email (email),
    KEY idx_form_submissions_created (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS email_queue (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    submission_id BIGINT UNSIGNED NOT NULL,
    email_type VARCHAR(64) NOT NULL,
    recipient VARCHAR(254) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    html_body MEDIUMTEXT NOT NULL,
    text_body MEDIUMTEXT NOT NULL,
    reply_to VARCHAR(254) DEFAULT NULL,
    status ENUM('pending', 'processing', 'sent', 'failed') NOT NULL DEFAULT 'pending',
    attempts INT UNSIGNED NOT NULL DEFAULT 0,
    available_at DATETIME NOT NULL,
    sent_at DATETIME DEFAULT NULL,
    last_error VARCHAR(500) DEFAULT NULL,
    processing_token CHAR(32) DEFAULT NULL,
    locked_at DATETIME DEFAULT NULL,
    created_at DATETIME NOT NULL,
    PRIMARY KEY (id),
    KEY idx_email_queue_status_available (status, available_at),
    KEY idx_email_queue_processing_token (processing_token),
    KEY idx_email_queue_submission_id (submission_id),
    CONSTRAINT fk_email_queue_submission
        FOREIGN KEY (submission_id) REFERENCES form_submissions(id)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS rate_limits (
    scope VARCHAR(80) NOT NULL,
    identifier_hash CHAR(64) NOT NULL,
    attempts INT UNSIGNED NOT NULL DEFAULT 0,
    reset_at DATETIME NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY (scope, identifier_hash),
    KEY idx_rate_limits_reset_at (reset_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS form_submission_tokens (
    fingerprint_hash CHAR(64) NOT NULL,
    expires_at DATETIME NOT NULL,
    created_at DATETIME NOT NULL,
    PRIMARY KEY (fingerprint_hash),
    KEY idx_form_submission_tokens_expires_at (expires_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

