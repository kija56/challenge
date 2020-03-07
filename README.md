Clone the project
Run npm install
Navigate to the public directory of the project (cd challenge/public)
Within the directory, install admin-lte via Bower (Run bower install admin-lte)
Run php artisan queue:work to start the queue for sending emails
When importing employees using excel file, 
->create an excell file with firstname, lastname, company_id, email and phone row headings
->save the file in csv format 
->Enter the details of your employees and then you can import your data to the database