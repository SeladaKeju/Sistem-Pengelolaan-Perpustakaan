<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {

        // view
        case 'members';
            include 'view/members/view.php';
            break;
        case 'books';
            include 'view/books/view.php';
            break;
        case 'loans';
            include 'view/loans/view.php';
            break;
        case 'dashboard';
            include 'view/dashboard/view.php';
            break;
        
        // create
        case 'members-create';
            include 'view/members/create.php';
            break;
        case 'books-create';
            include 'view/books/create.php';
            break;
        case 'loans-create';
            include 'view/loans/create.php';
            break;

        // delete
        case 'members-delete';
            include 'view/members/delete.php';
            break;
        case 'books-delete';
            include 'view/books/delete.php';
            break;
        case 'loans-delete';
            include 'view/loans/delete.php';
            break;

        // update
        case 'members-update';
            include 'view/members/update.php';
            break;
        case 'books-update';
            include 'view/books/update.php';
            break;
        case 'loans-update';
            include 'view/loans/update.php';
            break;
    }
}
