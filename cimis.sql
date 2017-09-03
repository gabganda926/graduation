DROP DATABASE Cimis;

CREATE DATABASE Cimis;

USE CIMIS;	

SELECT * FROM tbl_payments;

CREATE TABLE tbl_address
(
	add_ID INT NOT NULL IDENTITY(1,1),
	add_blcknum varchar(10),
	add_street varchar(20),
	add_subdivision varchar(50	),
	add_brngy varchar(20),
	add_district varchar(20),
	add_city varchar(20),
	add_province varchar(20),
	add_region varchar(11),
	add_zipcode varchar(4),
	PRIMARY KEY (add_ID)
);

CREATE TABLE tbl_personal_info
(
	pinfo_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	pinfo_first_name varchar(30) NOT NULL,
	pinfo_middle_name varchar(20),
	pinfo_last_name varchar(20) NOT NULL,
	pinfo_gender INT NOT NULL,
	pinfo_cpnum_1 varchar(13) NOT NULL,
	pinfo_cpnum_2 varchar(13),
	pinfo_tpnum varchar(11),
	pinfo_mail varchar(30) NOT NULL,
	pinfo_age DATE NOT NULL,
	pinfo_picture varchar(50),
);

CREATE TABLE tbl_contact_person
(
	cPerson_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	personal_info_ID INT NOT NULL,
	FOREIGN KEY (personal_info_ID) REFERENCES tbl_personal_info (pinfo_ID)
);

CREATE TABLE tbl_courier
(
	courier_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	personal_info_ID INT NOT NULL,
	courier_add_ID INT NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY	(courier_add_ID) REFERENCES tbl_address(add_ID),
	FOREIGN KEY (personal_info_ID) REFERENCES tbl_personal_info (pinfo_ID)
);

CREATE TABLE tbl_employee_role
(
	emp_role_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	emp_role_Name varchar(20) NOT NULL UNIQUE,
	emp_role_desc varchar(50) NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	del_flag int NOT NULL,
);
INSERT INTO tbl_employee_role VALUES('Manager','Manager','2017-08-30','2017-08-30','0');

INSERT INTO tbl_employee_role VALUES('Admin','Administrator','2017-08-30','2017-08-30','0');

INSERT INTO tbl_employee_role VALUES('Accounting Staff','Accounting Staff','2017-08-30','2017-08-30','0');

CREATE TABLE tbl_salesagent
(
	agent_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	personal_info_ID INT NOT NULL,
	agent_add_ID int NOT NULL,
	del_flag int NOT NULL,
	sales_agent_flag INT NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (personal_info_ID) REFERENCES tbl_personal_info (pinfo_ID),
	FOREIGN KEY	(agent_add_ID) REFERENCES tbl_address(add_ID),
);

CREATE TABLE tbl_employee
(
	emp_ID INT NOT NULL PRIMARY KEY,
	emp_role_ID INT NOT NULL,
	FOREIGN KEY (emp_ID) REFERENCES tbl_salesagent (agent_ID),
	FOREIGN KEY (emp_role_ID) REFERENCES tbl_employee_role(emp_role_ID),
);

CREATE TABLE tbl_client_list
(	
	client_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	client_type INT NOT NULL ,
	client_flag INT NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tbl_client
(
	client_ID INT NOT NULL PRIMARY KEY,
	personal_info_ID INT NOT NULL,
	client_add_ID int NOT NULL,
	client_sales_ID INT,
	FOREIGN KEY	(client_ID) REFERENCES tbl_client_list(client_ID),
	FOREIGN KEY	(client_add_ID) REFERENCES tbl_address(add_ID),
	FOREIGN KEY	(client_sales_ID) REFERENCES tbl_salesagent(agent_ID),
	FOREIGN KEY (personal_info_ID) REFERENCES tbl_personal_info (pinfo_ID)
);

CREATE TABLE tbl_company_info
(
	comp_ID INT NOT NULL PRIMARY KEY,
	comp_name varchar(30) NOT NULL,
	comp_telnum varchar(11) NOT NULL,
	comp_faxnum varchar(30),
	comp_email varchar(30) NOT NULL,
	comp_add_ID int NOT NULL,
	comp_cperson_ID int NOT NULL,
	comp_type INT NOT NULL,
	comp_sales_agent INT, 
	FOREIGN KEY	(comp_ID) REFERENCES tbl_client_list(client_ID),
	FOREIGN KEY (comp_sales_agent) REFERENCES tbl_salesagent(agent_ID),
	FOREIGN KEY (comp_cperson_ID) REFERENCES tbl_contact_person(cPerson_ID),
	FOREIGN KEY	(comp_add_ID) REFERENCES tbl_address(add_ID),
);

CREATE TABLE tbl_user_accounts
(
	user_ID INT NOT NULL PRIMARY KEY,
	user_name varchar(20) NOT NULL UNIQUE,
	user_password varchar(60) NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (user_ID) REFERENCES tbl_employee (emp_ID)
);

CREATE TABLE tbl_bank_info
(
	bank_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	bank_name varchar(50) NOT NULL,
	bank_name_alt varchar(50) NOT NULL,
	bank_mail varchar(20) NOT NULL,
	bank_telnum varchar(11) NOT NULL,
	bank_faxnum varchar(11),
	bank_cperson_ID int NOT NULL,
	bank_add_ID int NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY	(bank_add_ID) REFERENCES tbl_address(add_ID),
	FOREIGN KEY (bank_cperson_ID) REFERENCES tbl_contact_person(cPerson_ID)
);

CREATE TABLE tbl_policynumber
(
	policy_number varchar(20) NOT NULL PRIMARY KEY,
	insurance_compID INT NOT NULL,
	policyStatus_ID INT NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (insurance_compID) REFERENCES tbl_company_info(comp_ID)
);

CREATE TABLE tbl_installment_type
(
	installment_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	installment_type varchar(50) NOT NULL UNIQUE,
	installment_desc varchar(50),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tbl_vehicle_make
(
	vehicle_make_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	vehicle_make_name varchar(20) NOT NULL UNIQUE,
	vehicle_make_desc varchar(200),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tbl_vehicle_type
(
	vehicle_type_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	vehicle_type_name varchar(20) NOT NULL UNIQUE,
	vehicle_type_desc varchar(50),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tbl_vehicle_model
(
	vehicle_model_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	vehicle_model_name varchar(20) NOT NULL,
	vehicle_make_ID INT NOT NULL,
	vehicle_year varchar(4) NOT NULL,
	vehicle_type INT NOT NULL,
	vehicle_value FLOAT NOT NULL,
	vehicle_picture varchar(50),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (vehicle_type) REFERENCES tbl_vehicle_type(vehicle_type_ID),
	FOREIGN KEY (vehicle_make_ID) REFERENCES tbl_vehicle_make(vehicle_make_ID)
);

CREATE TABLE tbl_complaint_type
(
	complaintType_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	complaintType_name varchar(20) NOT NULL UNIQUE,
	complaintType_desc varchar(50),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tbl_premium_pa
(
	premiumPA_ID VARCHAR(8000) NOT NULL PRIMARY KEY,
	insurance_compID INT NOT NULL,
	insuranceLimit FLOAT NOT NULL,
	passengerNum INT NOT NULL,
	insuranceCover FLOAT NOT NULL,
	passengerCover FLOAT NOT NULL,
	mrCover FLOAT NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
	FOREIGN KEY (insurance_compID) REFERENCES tbl_company_info(comp_ID)
);

CREATE TABLE tbl_premium_damage
(
	premiumDG_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	damage_type INT NOT NULL,
	insurance_compID INT NOT NULL,
	insuranceLimit FLOAT NOT NULL,
	privateCar FLOAT NOT NULL,
	cv_Light FLOAT NOT NULL,
	cv_Heavy FLOAT NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (insurance_compID) REFERENCES tbl_company_info(comp_ID)
);

CREATE TABLE tbl_insurance_account
(
	account_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	client_ID INT NOT NULL,
	insurance_company INT NOT NULL,
	policy_number VARCHAR(20) NOT NULL UNIQUE,
	vehicle_type INT NOT NULL,
	vehicle_make INT NOT NULL,
	vehicle_model INT NOT NULL,
	plate_number VARCHAR(20) NOT NULL,
	serial_chassis VARCHAR(50) NOT NULL,
	motor_engine VARCHAR(50) NOT NULL,
	mv_file_number VARCHAR(50) NOT NULL,
	seat_capacity VARCHAR(50) NOT NULL,
	color VARCHAR(50) NOT NULL,
	inception_date date NOT NULL,
	form_picture varchar(50),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (client_ID) REFERENCES tbl_client_list(client_ID),
	FOREIGN KEY (insurance_company) REFERENCES tbl_company_info(comp_ID),
	FOREIGN KEY (policy_number) REFERENCES tbl_policynumber(policy_number),
	FOREIGN KEY (vehicle_type) REFERENCES tbl_vehicle_type(vehicle_type_ID),
	FOREIGN KEY (vehicle_make) REFERENCES tbl_vehicle_make(vehicle_make_ID),
	FOREIGN KEY (vehicle_model) REFERENCES tbl_vehicle_model(vehicle_model_ID),
);

CREATE TABLE tbl_payment_details
(
	payment_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	account_ID INT NOT NULL,
	bank_ID INT,
	personal_accident_ID VARCHAR(8000) NOT NULL,
	bodily_injury_ID INT NOT NULL,
	property_damage_ID INT NOT NULL,
	vehicle_class INT NOT NULL,
	payment_type INT NOT NULL,
	payment_status INT NOT NULL,
	installment_type INT,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (account_ID) REFERENCES tbl_insurance_account(account_ID),
	FOREIGN KEY (bank_ID) REFERENCES tbl_bank_info(bank_ID),
	FOREIGN KEY (installment_type) REFERENCES tbl_installment_type(installment_ID),
	FOREIGN KEY (personal_accident_ID) REFERENCES tbl_premium_pa(premiumPA_ID),
	FOREIGN KEY (bodily_injury_ID) REFERENCES tbl_premium_damage(premiumDG_ID),
	FOREIGN KEY (property_damage_ID) REFERENCES tbl_premium_damage(premiumDG_ID)
);

CREATE TABLE tbl_check_voucher
(
	cv_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	pay_ID INT NOT NULL,
	FOREIGN KEY (pay_ID) REFERENCES tbl_payment_details(payment_ID),
);

CREATE TABLE tbl_payments
(
	payment_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	or_number VARCHAR(20) UNIQUE,
	check_voucher INT NOT NULL,
	amount_paid FLOAT NOT NULL,
	amount FLOAT NOT NULL,
	paid_date DATE,
	due_date DATE NOT NULL,
	status INT NOT NULL,
	FOREIGN KEY (check_voucher) REFERENCES tbl_check_voucher(cv_ID),
);

CREATE TABLE tbl_claim_types
(
	claimType_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	claimType VARCHAR(50) NOT NULL,
	claimType_desc VARCHAR(100) NOT NULL,
	del_flag INT NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
);

CREATE TABLE tbl_claim_requirements
(
	claimReq_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	claimReq_Type INT NOT NULL,
	claimRequirement VARCHAR(100) NOT NULL,
	del_flag INT NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (claimReq_Type) REFERENCES tbl_claim_types(claimType_ID)
);

CREATE TABLE tbl_transmittal_record
(
	transRec_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	transRec VARCHAR(50) NOT NULL,
	transRec_desc VARCHAR(100),
	del_flag INT NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tbl_quotation
(
	quote_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	quote_status INT NOT NULL,
	del_flag INT NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tbl_quote_individual
(
	quote_indi_ID INT NOT NULL PRIMARY KEY,
	sales_agent INT,
	insurance_company INT NOT NULL,
	pinfo_first_name varchar(30) NOT NULL,
	pinfo_middle_name varchar(20),
	pinfo_last_name varchar(20) NOT NULL,
	pinfo_gender INT NOT NULL,
	pinfo_cpnum_1 varchar(13) NOT NULL,
	pinfo_cpnum_2 varchar(13),
	pinfo_tpnum varchar(11),
	pinfo_mail varchar(30) NOT NULL,
	pinfo_age DATE NOT NULL,
	add_blcknum varchar(10),
	add_street varchar(20),
	add_subdivision varchar(20),
	add_brngy varchar(20),
	add_district varchar(20),
	add_city varchar(20),
	add_province varchar(20),
	add_region varchar(11),
	add_zipcode varchar(4),
	vehicle_type_ID INT,
	vehicle_make_ID INT,
	vehicle_model_ID INT,
	specify_type varchar(20),
	specify_make varchar(20),
	specify_model varchar(20),
	vehicle_year_model INT,
	vehicle_value FLOAT,
	plate_number VARCHAR(20),
	serial_chassis VARCHAR(50),
	motor_engine VARCHAR(50),
	mv_file_number VARCHAR(50),
	seat_capacity VARCHAR(50),
	color VARCHAR(50),
	personal_accident_ID VARCHAR(8000) NOT NULL,
	bodily_injury_ID INT NOT NULL,
	property_damage_ID INT NOT NULL,
	vehicle_class INT NOT NULL,
	FOREIGN KEY (quote_indi_ID) REFERENCES tbl_quotation(quote_ID),
	FOREIGN KEY (sales_agent) REFERENCES tbl_salesagent (agent_ID),
	FOREIGN KEY (personal_accident_ID) REFERENCES tbl_premium_pa(premiumPA_ID),
	FOREIGN KEY (bodily_injury_ID) REFERENCES tbl_premium_damage(premiumDG_ID),
	FOREIGN KEY (property_damage_ID) REFERENCES tbl_premium_damage(premiumDG_ID),
	FOREIGN KEY (insurance_company) REFERENCES tbl_company_info(comp_ID),
	FOREIGN KEY (vehicle_type_ID) REFERENCES tbl_vehicle_type(vehicle_type_ID),
	FOREIGN KEY (vehicle_make_ID) REFERENCES tbl_vehicle_make(vehicle_make_ID),
	FOREIGN KEY (vehicle_model_ID) REFERENCES tbl_vehicle_model(vehicle_model_ID),
);

CREATE TABLE tbl_quote_company
(
	quote_comp_ID INT NOT NULL PRIMARY KEY,
	sales_agent INT,
	insurance_company INT NOT NULL,
	comp_name varchar(30) NOT NULL,
	comp_telnum varchar(11) NOT NULL,
	comp_faxnum varchar(30),
	comp_email varchar(30) NOT NULL,
	pinfo_first_name varchar(30) NOT NULL,
	pinfo_middle_name varchar(20),
	pinfo_last_name varchar(20) NOT NULL,
	pinfo_gender INT NOT NULL,
	pinfo_cpnum_1 varchar(13) NOT NULL,
	pinfo_cpnum_2 varchar(13),
	pinfo_tpnum varchar(11),
	pinfo_mail varchar(30) NOT NULL,
	pinfo_age DATE NOT NULL,
	add_blcknum varchar(10),
	add_street varchar(20),
	add_subdivision varchar(20),
	add_brngy varchar(20),
	add_district varchar(20),
	add_city varchar(20),
	add_province varchar(20),
	add_region varchar(11),
	add_zipcode varchar(4),
	vehicle_type_ID INT,
	vehicle_make_ID INT,
	vehicle_model_ID INT,
	specify_type varchar(20),
	specify_make varchar(20),
	specify_model varchar(20),
	vehicle_year_model INT,
	vehicle_value FLOAT,
	plate_number VARCHAR(20),
	serial_chassis VARCHAR(50),
	motor_engine VARCHAR(50),
	mv_file_number VARCHAR(50),
	seat_capacity VARCHAR(50),
	color VARCHAR(50),
	personal_accident_ID VARCHAR(8000) NOT NULL,
	bodily_injury_ID INT NOT NULL,
	property_damage_ID INT NOT NULL,
	vehicle_class INT NOT NULL,
	FOREIGN KEY (quote_comp_ID) REFERENCES tbl_quotation(quote_ID),
	FOREIGN KEY (sales_agent) REFERENCES tbl_salesagent (agent_ID),
	FOREIGN KEY (personal_accident_ID) REFERENCES tbl_premium_pa(premiumPA_ID),
	FOREIGN KEY (bodily_injury_ID) REFERENCES tbl_premium_damage(premiumDG_ID),
	FOREIGN KEY (property_damage_ID) REFERENCES tbl_premium_damage(premiumDG_ID),	
	FOREIGN KEY (insurance_company) REFERENCES tbl_company_info(comp_ID),
	FOREIGN KEY (vehicle_type_ID) REFERENCES tbl_vehicle_type(vehicle_type_ID),
	FOREIGN KEY (vehicle_make_ID) REFERENCES tbl_vehicle_make(vehicle_make_ID),
	FOREIGN KEY (vehicle_model_ID) REFERENCES tbl_vehicle_model(vehicle_model_ID),
);

CREATE TABLE tbl_disapproval_note
(
	approval_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	quote_ID INT NOT NULL,
	note VARCHAR(255),
	FOREIGN KEY (quote_ID) REFERENCES tbl_quotation(quote_ID),
);

CREATE TABLE tbl_client_account
(
	account_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	username VARCHAR(25) NOT NULL UNIQUE,
	password VARCHAR(60) NOT NULL,
	status INT NOT NULL,
);

CREATE TABLE tbl_list_quotes
(
	client_quote_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	account_ID INT NOT NULL,
	quote_ID INT NOT NULL,
	FOREIGN KEY (account_ID) REFERENCES tbl_client_account(account_ID),
	FOREIGN KEY (quote_ID) REFERENCES tbl_quotation(quote_ID),
);

CREATE TABLE tbl_list_insurance
(
	client_insure_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	account_ID INT NOT NULL,
	insure_ID INT NOT NULL,
	FOREIGN KEY (account_ID) REFERENCES tbl_client_account(account_ID),
	FOREIGN KEY (insure_ID) REFERENCES tbl_insurance_account(account_ID),
);

CREATE TABLE tbl_client_notif
(
	notification_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	account_ID INT NOT NULL,
	subject VARCHAR(8000) NOT NULL,
	content VARCHAR(8000) NOT NULL,
	date_sent DATETIME NOT NULL,
	status INT NOT NULL,
	FOREIGN KEY (account_ID) REFERENCES tbl_client_account(account_ID),
);

--SELECT * FROM tbl_payment_details;

--DROP TABLE tbl_list_quotes;
--DROP TABLE tbl_list_insurance;
--DROP TABLE tbl_client_notif;
--DROP TABLE tbl_client_account;

--UPDATE tbl_quotation SET quote_status = 2;

--DELETE FROM tbl_list_quotes;

--DELETE FROM tbl_client_account;

--DELETE FROM tbl_client_notif;

--SELECT * FROM tbl_company_info;

--SELECT * FROM tbl_payments;

--SELECT * FROM tbl_quote_individual;

--SELECT * FROM tbl_client;

--DELETE FROM tbl_list_quotes;