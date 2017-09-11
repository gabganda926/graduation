SELECT * FROM tbl_payments;
SELECT * FROM tbl_insurance_account
SELECT * FROM tbl_check_voucher
SELECT * FROM tbl_policynumber

DELETE FROM tbl_insurance_account

DELETE FROM tbl_payment_details

DELETE FROM tbl_check_voucher

DELETE FROM tbl_payments

SELECT * FROM tbl_payment_details

ALTER TABLE tbl_payments
ALTER COLUMN due_date datetime;

UPDATE tbl_payments
SET amount_paid = NULL, paid_date = NULL, status=1
WHERE payment_ID = 18;

UPDATE tbl_policynumber
SET policyStatus_ID=0;

UPDATE tbl_payments
SET due_date = DATEADD(day, DATEDIFF(day, 0, GETDATE()), '23:59:59');

SELECT DATEADD(day, DATEDIFF(day, 0, GETDATE()), '23:59:59')