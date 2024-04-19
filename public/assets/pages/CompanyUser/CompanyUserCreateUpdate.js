initializeSelectize('company_id', { placeholder: "Select Company" }, CompanyListApiUrl, {}, 'company_id', 'firm_name', selected_company_id)
selected_company_id = null;
initializeSelectize('role_id', { placeholder: "Select Role" }, RoleListApiUrl, {}, 'role_id', 'name', selected_role_id)
selected_role_id = null;
initializeSelectize('type', { placeholder: "User Type" })
