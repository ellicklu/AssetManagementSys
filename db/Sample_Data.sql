insert into assets_management.User values ('admin','admin','big','luxweiqi@gmail.com',1,CURRENT_TIMESTAMP,'111111',null);

select * from assets_management.User where S_User_Name='admin';

insert into assets_management.Asset_Info (S_FK_Input_User_Name,S_FK_Update_User_Name,S_Project_Name) values('admin', 'admin', 'ellick php project');
insert into assets_management.Asset_Info (I_Asset_ID,S_FK_Input_User_Name,S_FK_Update_User_Name,S_Project_Name) values(2,'admin', 'admin', 'ellick php project');

select * from assets_management.Asset_Info;