CREATE DATABASE Cimis;

DROP DATABASE Cimis;

--USE Cimis;

--ALTER DATABASE Cimis SET SINGLE_USER WITH ROLLBACK IMMEDIATE;
--DROP DATABASE Cimis;

DROP TABLE tbl_payments;

DROP TABLE tbl_insurance_account;

DROP TABLE tbl_payment_details;

SELECT * from tbl_company_info;

SELECT * from tbl_insurance_account;

SELECT * from tbl_vehicle_model;

SELECT * from tbl_personal_info;

SELECT * from tbl_address;

SELECT * from tbl_contact_person;

SELECT * from tbl_insurance;

SELECT * from tbl_client;

SELECT * from tbl_vehicle_type;

SELECT * from tbl_address;

SELECT * from tbl_bank_info;

SELECT * from tbl_vehicle_make;

SELECT * FROM tbl_employee

SELECT * from tbl_employee_type;

SELECT * from tbl_payment_details;

SELECT * from tbl_insurance_account;

DELETE FROM tbl_insurance_account;

DELETE FROM tbl_payment_details;

DELETE FROM tbl_payments;

SELECT * FROM tbl_address WHERE add_ID = 1;

INSERT INTO tbl_policy_status VALUES('Used','asd',0,'01-31-2017','01-31-2017');

UPDATE tbl_quotation
SET quote_status = 0;

UPDATE tbl_claim_requirements
SET del_flag = 0;

SELECT randomString = CONVERT(varchar(255), NEWID());