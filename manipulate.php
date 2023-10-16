<?php
    require_once __DIR__ . '/Book.php';
    require_once __DIR__ . '/Customer.php';

    $book1 = new Book(9785267006323, "1984", "George Orwell", 12);
    $book2 = new Book(9780061120084, "To Kill a Mockingbird", "Harper Lee", 2);

    $customer1 = new Customer(1, 'John', 'Doe', 'johndoe@mail.com');
    $customer2 = new Customer(2, 'Mary', 'Poppins', 'mp@mail.com');

    $book1->available = 2;
    // $customer1->id = 3; // This will cause an error

   
    echo "using __call(), " . $book1->getTitle() . " " . $book1->getAuthor() . " // book1 <br>"; // __call method is working
    echo "using __get(), " .  $book1->title . " " . $book1->author . " // book1 <br>"; // __get and __set method is working
    echo "using __toString, " . (string)$book2 . ", " . "Isbn : " . $book2->isbn . "<br>";
    // echo "Isbn : " . $book2->getIsbn() . "<br>";

    
    // echo $customer1->firstname . " " . $customer1->surname . " // customer1 <br>" . $customer1->email . "<br>"; // __get and __set
    echo "<br>";
    echo $customer1->getFirstname() . " " . $customer1->getSurname() . " // customer1 <br>"; // __call method is working
    echo "Email : " . $customer1->getEmail() . "<br>";
    // echo "New email : " . $customer1->email . "<br>";

    // $customer1->email = 'johndoe2023@mail.com'; // __get and __set 
    echo "setting email using __call(), >";
    $customer1->setEmail('johndoe__call()@mail.com'); // __call method is working
    echo "New email : " . $customer1->getEmail() . "<br>";

    echo "setting email using __set(),  ";
    $customer1->email = 'johndoe__set()@mail.com'; // __get and __set method is working
    echo "New email : " . $customer1->getEmail() . "<br>";


    echo "<br>";
    echo "use addCopy: <br> ";
    echo "book1  available " . $book1->available . " copies<br>"; // __get and __set method is working
    $book1->addCopy();
    echo "book1  available " . $book1->getAvailable() . " copies [applied]<br>"; // __call method is working
    echo "<br> use getCopy: <br>";
    if ($book1->getCopy()) {
        echo "Here, your copy. ";
    } else {
        echo "Sorry, no copies available. ";
    }
    echo "<br>";
    echo "book1  available " . $book1->getAvailable() . " copies<br>"; // __call method is working
?>  