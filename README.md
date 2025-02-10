Library Management System

📌 Introduction

The Library Management System is a web-based application designed to facilitate the management of books, members, and loan transactions within a library. This system supports multiple roles, including administrators and staff, to efficiently handle book records, member registrations, and borrowing activities.

🎯 Features

1. Book Management

Add, edit, delete, and search books by title, category, or author.

Store book details such as ISBN, title, author, publisher, year of publication, and stock count.

2. Member Management

Register new library members with personal details (name, NIK, address, phone number, email).

View and delete inactive member accounts.

3. Loan and Return System

Borrow books with member details and loan date.

Automatic calculation of late return fines (e.g., Rp 1.000/day).

Maintain a history of borrowings for each member.

4. Reports and Statistics

Generate reports on frequently borrowed books.

Track active members.

Record revenue from late return fines.

5. Multi-Role Login System

Admin: Manage books, members, and transactions.

Staff: Handle book borrowing and returns.

🛠️ Technologies Used

Frontend: Bootstrap 5, HTML, CSS, JavaScript

Backend: PHP, MySQL

Database Management: MySQL

Version Control: Git

📋 Table Schema

Books Table

Column

Data Type

Description

id

INT (PK)

Auto-incremented book ID

isbn

VARCHAR

Unique book ISBN

title

VARCHAR

Book title

author

VARCHAR

Book author

publisher

VARCHAR

Book publisher

year

INT

Publication year

stock

INT

Number of available copies

Members Table

Column

Data Type

Description

id

INT (PK)

Auto-incremented member ID

nik

VARCHAR

National ID number

name

VARCHAR

Full name

address

TEXT

Member's address

phone

VARCHAR

Contact number

email

VARCHAR

Email address

Loans Table

Column

Data Type

Description

id

INT (PK)

Auto-incremented transaction ID

member_id

INT (FK)

References member ID

book_id

INT (FK)

References book ID

loan_date

DATE

Date of borrowing

return_date

DATE

Expected return date

fine

INT

Fine for late return

🚀 Installation & Setup

1. Clone Repository

 git clone https://github.com/your-repository/library-management.git

2. Configure Database

Import the SQL file into MySQL.

Update config.php with your database credentials.

3. Start Local Server

Use XAMPP, WAMP, or a similar local server environment to run the project.

🎯 Usage Guide

Open the project in your browser (http://localhost/library-management).

Login as Admin or Staff.

Manage books, members, and transactions via the dashboard.
