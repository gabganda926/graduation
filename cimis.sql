DROP DATABASE Cimis;

CREATE DATABASE Cimis;

USE CIMIS;

CREATE TABLE tbl_address
(
	add_ID INT NOT NULL IDENTITY(1,1),
	add_blcknum varchar(10),
	add_street varchar(20),
	add_subdivision varchar(50),
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

INSERT INTO tbl_employee_role VALUES('Admin','Administrator','2017-08-30','2017-08-30','0');

INSERT INTO tbl_employee_role VALUES('Accounting Staff','Accounting Staff','2017-08-30','2017-08-30','0');

INSERT INTO tbl_employee_role VALUES('Manager','Manager','2017-08-30','2017-08-30','0');

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

INSERT INTO tbl_address(add_city,add_region) VALUES('Pasig City','NCR');
INSERT INTO tbl_personal_info(pinfo_first_name,pinfo_last_name,pinfo_gender,pinfo_age,pinfo_cpnum_1,pinfo_mail) 
  VALUES('Person','Contact','0','1990-01-22','09012345678','cperson@yahoo.com');
INSERT INTO tbl_contact_person(personal_info_ID) VALUES('1');
INSERT INTO tbl_client_list(client_type,client_flag,created_at,updated_at,del_flag) VALUES('0','0','2017-08-30','2017-08-30','0');
INSERT INTO tbl_company_info(comp_ID,comp_name,comp_add_ID,comp_cperson_ID,comp_telnum,comp_type,comp_email)
  VALUES('1','FPG Insurance','1','1','1234567','0','insuranceEmail@yahoo.com');

INSERT INTO tbl_address(add_city,add_region) VALUES('Pasig City','NCR');
INSERT INTO tbl_personal_info(pinfo_first_name,pinfo_last_name,pinfo_gender,pinfo_age,pinfo_cpnum_1,pinfo_mail) 
  VALUES('Person','Contact','0','1990-01-22','09012345678','cperson@yahoo.com');
INSERT INTO tbl_contact_person(personal_info_ID) VALUES('2');
INSERT INTO tbl_client_list(client_type,client_flag,created_at,updated_at,del_flag) VALUES('0','0','2017-08-30','2017-08-30','0');
INSERT INTO tbl_company_info(comp_ID,comp_name,comp_add_ID,comp_cperson_ID,comp_telnum,comp_type,comp_email)
  VALUES('2','Commonwealth Insurance','2','2','1234567','0','insuranceEmail@yahoo.com');

  INSERT INTO tbl_address(add_city,add_region) VALUES('Pasig City','NCR');
INSERT INTO tbl_personal_info(pinfo_first_name,pinfo_last_name,pinfo_gender,pinfo_age,pinfo_cpnum_1,pinfo_mail) 
  VALUES('Person','Contact','0','1990-01-22','09012345678','cperson@yahoo.com');
INSERT INTO tbl_contact_person(personal_info_ID) VALUES('3');
INSERT INTO tbl_client_list(client_type,client_flag,created_at,updated_at,del_flag) VALUES('0','0','2017-08-30','2017-08-30','0');
INSERT INTO tbl_company_info(comp_ID,comp_name,comp_add_ID,comp_cperson_ID,comp_telnum,comp_type,comp_email)
  VALUES('3','Standard Insurance','3','3','1234567','0','insuranceEmail@yahoo.com');

  INSERT INTO tbl_address(add_city,add_region) VALUES('Pasig City','NCR');
INSERT INTO tbl_personal_info(pinfo_first_name,pinfo_last_name,pinfo_gender,pinfo_age,pinfo_cpnum_1,pinfo_mail) 
  VALUES('Person','Contact','0','1990-01-22','09012345678','cperson@yahoo.com');
INSERT INTO tbl_contact_person(personal_info_ID) VALUES('4');
INSERT INTO tbl_client_list(client_type,client_flag,created_at,updated_at,del_flag) VALUES('0','0','2017-08-30','2017-08-30','0');
INSERT INTO tbl_company_info(comp_ID,comp_name,comp_add_ID,comp_cperson_ID,comp_telnum,comp_type,comp_email)
  VALUES('4','People''s General Insurance','4','4','1234567','0','insuranceEmail@yahoo.com');

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
	vehicle_depreciation FLOAT NOT NULL,
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
	vehicle_model_name varchar(20) NOT NULL,
	vehicle_make_name varchar(20) NOT NULL,
	vehicle_type_name varchar(20) NOT NULL,
	vehicle_year varchar(4) NOT NULL,
	vehicle_value FLOAT NOT NULL,
	plate_number VARCHAR(20) NOT NULL,
	serial_chassis VARCHAR(50) NOT NULL,
	motor_engine VARCHAR(50) NOT NULL,
	mv_file_number VARCHAR(50) NOT NULL,
	seat_capacity VARCHAR(50) NOT NULL,
	color VARCHAR(50) NOT NULL,
	inception_date date NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (client_ID) REFERENCES tbl_client_list(client_ID),
	FOREIGN KEY (insurance_company) REFERENCES tbl_company_info(comp_ID),
);

CREATE TABLE tbl_payment_details
(
	payment_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	account_ID INT NOT NULL,
	bank_ID INT,
	deductible FLOAT NOT NULL,
	towing FLOAT NOT NULL,
	arl FLOAT NOT NULL,
	coverage FLOAT NOT NULL,
	aon_cover FLOAT NOT NULL,
	aon_premium FLOAT NOT NULL,
	pa_cover FLOAT NOT NULL,
	pa_premium FLOAT NOT NULL,
	bi_cover FLOAT NOT NULL,
	bi_premium FLOAT NOT NULL,
	pd_cover FLOAT NOT NULL,
	pd_premium FLOAT NOT NULL,
	odt_cover FLOAT NOT NULL,
	odt_premium FLOAT NOT NULL,
	basicpremium FLOAT NOT NULL,
	vat FLOAT NOT NULL,
	dst FLOAT NOT NULL,
	lgt FLOAT NOT NULL,
	total FLOAT NOT NULL,
	vehicle_class INT NOT NULL,
	payment_type INT NOT NULL,
	payment_status INT NOT NULL,
	installment_type varchar(50),
	installment_desc varchar(50),
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (account_ID) REFERENCES tbl_insurance_account(account_ID),
	FOREIGN KEY (bank_ID) REFERENCES tbl_bank_info(bank_ID),
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
	amount_paid FLOAT,
	amount FLOAT NOT NULL,
	paid_date datetime,
	due_date DATETIME NOT NULL,
	status INT NOT NULL, --0 paid, 1 to be paid, 3 late, 4 lapsed
	employee_info_ID INT,
	FOREIGN KEY (employee_info_ID) REFERENCES tbl_personal_info(pinfo_ID),
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
	updated_at datetime NOT NULL,
	employee_info_ID INT,
	FOREIGN KEY (employee_info_ID) REFERENCES tbl_personal_info(pinfo_ID),
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

CREATE TABLE tbl_transmittal_request
(
	req_ID VARCHAR(50) NOT NULL PRIMARY KEY,
	account_ID INT NOT NULL,
	date_recieved DATETIME NOT NULL,
	date_update DATETIME,
	status INT NOT NULL, -- 0 - New, 1 - Accepted ng manager TO DO, 2 - Declined, 3 - Processing, 4 - On Hold, 5 - Sent, 6 - Sent to manager, 7 - Cancelled
	employee_info_ID INT,
	FOREIGN KEY (employee_info_ID) REFERENCES tbl_personal_info(pinfo_ID),
	FOREIGN KEY (account_ID) REFERENCES tbl_client_account(account_ID),
);

CREATE TABLE tbl_transmittal_documents
(
	req_ID VARCHAR(50) NOT NULL,
	document VARCHAR(50) NOT NULL,
	document_desc VARCHAR(100),
	FOREIGN KEY (req_ID) REFERENCES tbl_transmittal_request(req_ID),
);

CREATE TABLE tbl_transmittal_details
(
	req_ID VARCHAR(50) NOT NULL,
	insurance_company INT NOT NULL,
	policy_number VARCHAR(20) NOT NULL,
	name VARCHAR(50) NOT NULL,
	cp_1 VARCHAR(15) NOT NULL,
	cp_2 VARCHAR(15),	
	tp_num VARCHAR(15) NOT NULL,
	email VARCHAR(50) NOT NULL,
	address VARCHAR(100) NOT NULL,
	FOREIGN KEY (insurance_company) REFERENCES tbl_company_info(comp_ID),
	FOREIGN KEY (req_ID) REFERENCES tbl_transmittal_request(req_ID),
);

CREATE TABLE tbl_transmittal_process
(
	process_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	courier_ID INT NOT NULL,
	request_ID VARCHAR(50) NOT NULL,
	last_update DATETIME NOT NULL,
	FOREIGN KEY (request_ID) REFERENCES tbl_transmittal_request(req_ID),
);

CREATE TABLE tbl_transmit_documents
(
	process_ID INT NOT NULL,
	document VARCHAR(50) NOT NULL,
	document_desc VARCHAR(100),
	FOREIGN KEY (process_ID) REFERENCES tbl_transmittal_process(process_ID),
);

CREATE TABLE tbl_claimNotifiedByRepresentative
(
	notifier_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	notifier_Name VARCHAR (200) NOT NULL,
	notifier_Relation VARCHAR (50) NOT NULL,
	notifier_telnum VARCHAR(11),
	notifier_cell_1 VARCHAR (13) NOT NULL,
	notifier_cell_2 VARCHAR (13),
	notifier_email VARCHAR (50) NOT NULL,
);

CREATE TABLE tbl_claimRequest
(
	claim_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	claimType_ID INT NOT NULL,
	account_ID INT NOT NULL,
	lossDate DATETIME,
	placeOfLoss VARCHAR(100) NOT NULL,
	description VARCHAR (8000) NOT NULL,
	notifiedByType INT NOT NULL, --1 kapag policyholder, 2 kapag representative
	notifier_ID INT,
	status INT NOT NULL, --0 kapag new; determine kung incomplete/complete na ung requirements, 1 kapag nasa manager na, 2 kapag na-transmit na sa inscompany, 3 rejected
	del_flag INT NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	employee_info_ID INT,
	FOREIGN KEY (employee_info_ID) REFERENCES tbl_personal_info(pinfo_ID),
	FOREIGN KEY (claimType_ID) REFERENCES tbl_claim_types(claimType_ID),
	FOREIGN KEY (account_ID) REFERENCES tbl_insurance_account(account_ID),
	FOREIGN KEY (notifier_ID) REFERENCES tbl_claimNotifiedByRepresentative(notifier_ID),
);

CREATE TABLE tbl_claimRequirements_Files
(
	claimReqFile_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	claim_ID INT NOT NULL,
	claimReq_ID INT NOT NULL,
	claimReq_picture varchar(50),
	claimReq_picture2 varchar(50),
	claimReq_picture3 varchar(50),
	claimReq_picture4 varchar(50),
	claimReq_picture5 varchar(50),
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (claim_ID) REFERENCES tbl_claimRequest(claim_ID),
	FOREIGN KEY (claimReq_ID) REFERENCES tbl_claim_requirements(claimReq_ID),
);

CREATE TABLE tbl_web_claimNotifiedByRepresentative --gumawa ako ng bago kasi try lang to lol
(
	web_notifier_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	web_notifier_Name VARCHAR (200) NOT NULL,
	web_notifier_Relation VARCHAR (50) NOT NULL,
	web_notifier_telnum VARCHAR(11),
	web_notifier_cell_1 VARCHAR (13) NOT NULL,
	web_notifier_cell_2 VARCHAR (13),
	web_notifier_email VARCHAR (50) NOT NULL,
);

CREATE TABLE tbl_web_claimRequest
(
	web_claim_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	web_claimType_ID INT NOT NULL,
	web_lossDate DATETIME,
	web_policyno varchar(50) NOT NULL,
	web_inscompany INT NOT NULL,
	web_placeOfLoss VARCHAR(100) NOT NULL,
	web_description VARCHAR (8000) NOT NULL,
	web_notifiedByType INT NOT NULL, --1 kapag policyholder, 2 kapag representative
	web_notifier_ID INT,
	web_status INT, --0 new, 1 accepted at nalipat na sa list, 2 rejected
	web_del_flag INT NOT NULL,
	web_created_at datetime NOT NULL,
	web_updated_at datetime NOT NULL,
	FOREIGN KEY (web_claimType_ID) REFERENCES tbl_claim_types(claimType_ID),
	FOREIGN KEY (web_notifier_ID) REFERENCES tbl_web_claimNotifiedByRepresentative(web_notifier_ID),
	FOREIGN KEY (web_inscompany) REFERENCES tbl_company_info(comp_ID)
);

CREATE TABLE tbl_transmit_claim
(
	transmitClaim_ID INT NOT NULL IDENTITY (1,1) PRIMARY KEY,
	claim_ID INT NOT NULL,
	inscomp_ID INT NOT NULL,
	courier_ID INT NOT NULL,
	status INT NOT NULL, --0 processing, 1 sent, 2 cancelled, 3 on hold
	created_at datetime not null,
	updated_at datetime not null,
	FOREIGN KEY (claim_ID) REFERENCES tbl_claimRequest(claim_ID),
	FOREIGN KEY (inscomp_ID) REFERENCES tbl_company_info (comp_ID),
	FOREIGN KEY (courier_ID) REFERENCES tbl_courier (courier_ID),
);

CREATE TABLE tbl_complaint_sents
(
	complaint_ID INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
	account_ID INT,
	insurance_company INT NOT NULL,
	policy_number VARCHAR(20) NOT NULL,
	name VARCHAR(50) NOT NULL,
	cp_1 VARCHAR(15) NOT NULL,
	cp_2 VARCHAR(15),	
	tp_num VARCHAR(15),
	email VARCHAR(50) NOT NULL,
	address VARCHAR(100) NOT NULL,
	complaintType_name varchar(20) NOT NULL,
	complaintType_desc varchar(50),
	complaint varchar(500),
	status INT NOT NULL, -- 0 - New, 1 - process/action ongoing, 2 - settled, 3 - unsettled/rejected
	date_sent DATETIME NOT NULL,
	date_updated DATETIME,
	FOREIGN KEY (insurance_company) REFERENCES tbl_company_info(comp_ID),
	FOREIGN KEY (account_ID) REFERENCES tbl_client_account(account_ID),
);

CREATE TABLE tbl_complaint_action
(
	comp_action_ID INT IDENTITY(1,1) NOT NULL,
	complaint_ID INT NOT NULL,
	emp_ID INT NOT NULL,
	status INT NOT NULL, -- 0 high, 1 medium, 2 low
	FOREIGN KEY (complaint_ID) REFERENCES tbl_complaint_sents(complaint_ID),
	FOREIGN KEY (emp_ID) REFERENCES tbl_employee(emp_ID),
);

CREATE TABLE tbl_ledger
(
	ledger_ID INT IDENTITY(1,1) NOT NULL,
	account_ID INT NOT NULL,
	payment_ID INT NOT NULL,
	income FLOAT,
	commission FLOAT,
	remarks varchar(100),
	created_at datetime not null,
	employee_info_ID INT NOT NULL,
	FOREIGN KEY (employee_info_ID) REFERENCES tbl_personal_info(pinfo_ID),
	FOREIGN KEY (account_ID) REFERENCES tbl_insurance_account(account_ID),
	FOREIGN KEY (payment_ID) REFERENCES tbl_payment_details(payment_ID),
);

CREATE TABLE tbl_payment_check
(
	check_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	bank_ID INT NOT NULL,
	check_number VARCHAR(100) NOT NULL UNIQUE,
	payment_ID INT NOT NULL,
	FOREIGN KEY (bank_ID) REFERENCES tbl_bank_info(bank_ID),
	FOREIGN KEY (payment_ID) REFERENCES tbl_payments(payment_ID)
);

CREATE TABLE tbl_online_payments
(
	payment_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	pay_ID INT NOT NULL,
	amount_paid FLOAT NOT NULL,
	deposit_file VARCHAR(50) NOT NULL,
	deposit_date DATETIME NOT NULL,
	remittance_date DATETIME NOT NULL,
	FOREIGN KEY (pay_ID) REFERENCES tbl_payments(payment_ID),
);

CREATE TABLE tbl_util_computation
(
	comp_ID INT NOT NULL PRIMARY KEY, --1 FPG, 2 COMM, 3 STD, 4 PGI
	deductible FLOAT,
	towing FLOAT,
	aon FLOAT,
	FOREIGN KEY (comp_ID) REFERENCES tbl_company_info,
);

INSERT INTO tbl_util_computation(comp_ID, deductible, towing, aon) VALUES ('1', '3100', '100', '.02');
INSERT INTO tbl_util_computation(comp_ID, deductible, towing, aon) VALUES ('2', '2000', '100', '.005');
INSERT INTO tbl_util_computation(comp_ID, deductible, towing, aon) VALUES ('3', '2000', '100', '');
INSERT INTO tbl_util_computation(comp_ID, deductible, towing, aon) VALUES ('4', '3000', '100', '.005');

CREATE TABLE tbl_util_tax
(
	tax_ID INT NOT NULL PRIMARY KEY, 
	tax_name varchar(50),
	percentage FLOAT,
);

INSERT INTO tbl_util_tax(tax_ID, tax_name, percentage) VALUES ('1', 'Documentary Stamp Tax (DST)', '.125');
INSERT INTO tbl_util_tax(tax_ID, tax_name, percentage) VALUES ('2', 'Value Added Tax (VAT)', '.12');

--SELECT * FROM tbl_complaint_sents;
--SELECT * FROM tbl_complaint_action;
--DROP TABLE tbl_complaint_action;

--SELECT * FROM tbl_vehicle_make;
--SELECT * FROM tbl_vehicle_type;
--SELECT * FROM tbl_vehicle_model;

--SELECT * FROM tbl_user_accounts;
--SELECT * FROM tbl_employee_role;
--SELECT * FROM tbl_payments;
--SELECT * FROM tbl_premium_damage;

--SELECT * FROM tbl_transmittal_request;
--SELECT * FROM tbl_transmittal_documents;
--SELECT * FROM tbl_transmittal_details;
--SELECT * FROM tbl_transmittal_process;
--SELECT * FROM tbl_transmit_documents;

--DROP TABLE tbl_user_accounts;
--DROP TABLE tbl_transmittal_documents;
--DROP TABLE tbl_transmittal_details;
--DROP TABLE tbl_transmittal_process;
--DROP TABLE tbl_transmit_documents;

--DROP TABLE tbl_list_quotes;
--DROP TABLE tbl_list_insurance;
--DROP TABLE tbl_client_notif;
--DROP TABLE tbl_client_account;

--UPDATE tbl_complaint_sents SET status = 2;

--UPDATE tbl_quote_individual SET vehicle_model_ID = '2';

--DELETE FROM tbl_list_quotes;

--DELETE FROM tbl_client_account;

--DELETE FROM tbl_client_notif;

--SELECT * FROM tbl_company_info;

--SELECT * FROM tbl_payments;

--SELECT * FROM tbl_insurance_account;

--SELECT * FROM tbl_client_account;

--DELETE FROM tbl_insurance_account;