DROP TABLE tbl_payments

DROP TABLE tbl_check_voucher

DROP TABLE tbl_payment_details

DROP TABLE tbl_list_insurance

DROP TABLE tbl_claimRequirements_Files

DROP TABLE tbl_claimRequest

DROP TABLE tbl_insurance_account

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
	status INT NOT NULL,
	FOREIGN KEY (check_voucher) REFERENCES tbl_check_voucher(cv_ID),
);


CREATE TABLE tbl_list_insurance
(
	client_insure_ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
	account_ID INT NOT NULL,
	insure_ID INT NOT NULL,
	FOREIGN KEY (account_ID) REFERENCES tbl_client_account(account_ID),
	FOREIGN KEY (insure_ID) REFERENCES tbl_insurance_account(account_ID),
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
	del_flag INT NOT NULL,
	created_at datetime NOT NULL,
	updated_at datetime NOT NULL,
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
	FOREIGN KEY (claim_ID) REFERENCES tbl_claimRequest(claim_ID),
	FOREIGN KEY (claimReq_ID) REFERENCES tbl_claim_requirements(claimReq_ID),
);
