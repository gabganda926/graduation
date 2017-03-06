USE CIMIS;

CREATE TABLE tb_address
(
	add_ID INT NOT NULL IDENTITY(1,1),
	add_blcknum varchar(50),
	add_street varchar(50),
	add_subdivision varchar(50),
	add_brngy varchar(50),
	add_district varchar(50),
	add_city varchar(50),
	add_province varchar(50),
	add_region varchar(50),
	add_zipcode varchar(50),
	del_flag int NOT NULL,
	PRIMARY KEY (add_ID)
);

CREATE TABLE tb_personal_info
(
	pinfo_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	pinfo_first_name varchar(50) NOT NULL,
	pinfo_middle_name varchar(50),
	pinfo_last_name varchar(50) NOT NULL,
	pinfo_contact varchar(11) NOT NULL,
	pinfo_mail varchar(50) NOT NULL,
	pinfo_picture varchar(50),
	del_flag int NOT NULL
);

CREATE TABLE tb_employee_type
(
	emptype_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	emptype_Name varchar(50) NOT NULL,
	emptype_Desc varchar(50) NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tb_client_type
(
	clientType_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	clientType_type varchar(50) NOT NULL,
	clientType_desc varchar(100),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tb_contact_person
(
	cPerson_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	personal_info_ID INT NOT NULL,
	del_flag int NOT NULL,
	FOREIGN KEY (personal_info_ID) REFERENCES tb_personal_info (pinfo_ID)
);

CREATE TABLE tb_sender
(
	sender_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	personal_info_ID INT NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (personal_info_ID) REFERENCES tb_personal_info (pinfo_ID)
);

CREATE TABLE tb_courier
(
	courier_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	personal_info_ID INT NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (personal_info_ID) REFERENCES tb_personal_info (pinfo_ID)
);

CREATE TABLE tb_salesagent
(
	agent_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	personal_info_ID INT NOT NULL,
	agent_add_ID int NOT NULL,
	commision INT NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (personal_info_ID) REFERENCES tb_personal_info (pinfo_ID),
	FOREIGN KEY	(agent_add_ID) REFERENCES tb_address(add_ID),
);

CREATE TABLE tb_employee
(
	emp_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	personal_info_ID INT NOT NULL,
	emp_add_ID int NOT NULL,
	emp_type INT NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (emp_type) REFERENCES tb_employee_type(emptype_ID),
	FOREIGN KEY (personal_info_ID) REFERENCES tb_personal_info (pinfo_ID),
	FOREIGN KEY	(emp_add_ID) REFERENCES tb_address(add_ID),
);

CREATE TABLE tb_user_access
(
	user_type_ID INT NOT NULL IDENTITY(1,1),
	user_type_name varchar(50) NOT NULL,
	user_type_desc varchar(50),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tb_client
(
	client_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	personal_info_ID INT NOT NULL,
	client_add_ID int NOT NULL,
	client_type INT NOT NULL,
	client_dob DATE NOT NULL,
	client_tcontact VARCHAR(7),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY	(client_add_ID) REFERENCES tb_address(add_ID),
	FOREIGN KEY (personal_info_ID) REFERENCES tb_personal_info (pinfo_ID),
	FOREIGN KEY (client_type) REFERENCES tb_client_type(clientType_ID)
);

CREATE TABLE tb_user_accounts
(
	user_ID INT NOT NULL PRIMARY KEY,
	user_name varchar(50) NOT NULL UNIQUE,
	user_password varchar(50) NOT NULL,
	user_access INT NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (user_ID) REFERENCES tb_employee (emp_ID)
);

CREATE TABLE tb_company_info
(
	comp_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	comp_name varchar(50) NOT NULL UNIQUE,
	comp_add_ID int NOT NULL,
	comp_cperson_ID int NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (comp_cperson_ID) REFERENCES tb_contact_person(cPerson_ID),
	FOREIGN KEY	(comp_add_ID) REFERENCES tb_address(add_ID),
);

CREATE TABLE tb_bank_info
(
	bank_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	bank_code varchar(10) NOT NULL UNIQUE,
	bank_name varchar(50) NOT NULL UNIQUE,
	bank_cperson_ID int NOT NULL,
	bank_add_ID int NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY	(bank_add_ID) REFERENCES tb_address(add_ID),
	FOREIGN KEY (bank_cperson_ID) REFERENCES tb_contact_person(cPerson_ID)
);

CREATE TABLE tb_policy_status
(
	policyStatus_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	policyStatus_name varchar(50) NOT NULL,
	policyStatus_desc varchar(100),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tb_policynumber
(
	policy_number varchar(50) NOT NULL PRIMARY KEY,
	insurance_compID INT NOT NULL,
	policyStatus_ID INT NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (insurance_compID) REFERENCES tb_company_info(comp_ID),
	FOREIGN KEY (policyStatus_ID) REFERENCES tb_policy_status(policyStatus_ID)
);

CREATE TABLE tb_installment_type
(
	installment_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	installment_type varchar(50) NOT NULL,
	installment_desc varchar(100),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tb_vehicle_manufacturer
(
	vehicle_make_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	vehicle_make_name varchar(50) NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tb_vehicle_model
(
	vehicle_model_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	vehicle_model_name varchar(50) NOT NULL,
	vehicle_make_ID INT NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
	FOREIGN KEY (vehicle_make_ID) REFERENCES tb_vehicle_manufacturer(vehicle_make_ID)
);

CREATE TABLE tb_vehicle_acce
(
	vehicle_acce_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	vehicle_acce_name varchar(50) NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tb_vehicle_type
(
	vehicle_type_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	vehicle_type_name varchar(50) NOT NULL,
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tb_quote_status
(
	quoteStatus_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	quoteStatus_name varchar(50) NOT NULL,
	quoteStatus_desc varchar(100),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tb_check_status
(
	checkStatus_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	checkStatus_name varchar(50) NOT NULL,
	checkStatus_desc varchar(100),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);
CREATE TABLE tb_transmittal_status
(
	transmittalStatus_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	transmittalStatus_name varchar(50) NOT NULL,
	transmittalStatus_desc varchar(100),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tb_complaint_type
(
	complaintType_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	complaintType_name varchar(50) NOT NULL,
	complaintType_desc varchar(100),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tb_complaint_status
(
	complaintStatus_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	complaintStatus_name varchar(50) NOT NULL,
	complaintStatus_desc varchar(100),
	del_flag int NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL
);

CREATE TABLE tb_client_insurance
(
	client_ID INT NOT NULL,
	client_pno varchar(50) NOT NULL,
	client_sales_agent INT NOT NULL,
	FOREIGN KEY (client_pno) REFERENCES tb_policynumber(policy_number),
	FOREIGN KEY (client_sales_agent) REFERENCES tb_salesagent(agent_ID),
	FOREIGN KEY (client_ID) REFERENCES tb_client(client_ID)
);
