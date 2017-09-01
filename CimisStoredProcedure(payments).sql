
CREATE PROCEDURE add_checkvoucher                     
       @amount						   FLOAT                 , 
       @payeddate                      DATETIME      = NULL  , 
       @verified_by                    INT				     
AS 
BEGIN 
     INSERT INTO tbl_payments
          ( 
            check_voucher                   ,
            payed_amount                    ,
            payed_at						,
            verified_by                                  
          ) 
     VALUES 
          ( 
            CONVERT(varchar(255), NEWID())  ,
            @amount                         ,
            @payeddate                      ,
            @verified_by                    
          ) 

END 