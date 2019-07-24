<?php


function printMenu() {

    global $exit_value;
    echo "************ Reservation System ******************\n";
    echo "1 - List Products\n";
    echo "2 - Add Product\n";
    echo "3 - Quit\n";
    echo "************ Reservation System ******************\n";
    echo "Enter your choice from 1 to ".$exit_value.": ";

    menu();
}

function menu() {
    global $exit_value;
    // Read user choice
    $choice = trim( fgets(STDIN) );

// Exit application
    if( $choice == $exit_value ) {

        exit(0);
    }

// Act based on user choice
    switch( $choice ) {

        case 1:
            {
                listProduct();

                break;
            }
        case 2:
            {
                addProduct();
                break;
            }
        default:
            {
                echo "\n\nNo choice is entered. Please provide a valid choice.\n\n";
            }
    }


}