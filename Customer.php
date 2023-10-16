<?php
    class Customer{
        private $id;
        private $firstname;
        private $surname;
        private $email;

        public function __construct(int $id, string $firstname, string $surname, string $email) {
            $this->id = $id;
            $this->firstname = $firstname;
            $this->surname = $surname;
            $this->email = $email;
        }

        public function __toString() {
            $result = '<i>' . $this->firstname . '</i> - ' . $this->surname;
            return $result;
        }

        // public function getId(): id {
        //     return $this->id;
        // }
        // public function getFirstname(): string {
        //     return $this->firstname;
        // }
        // public function getSurname(): string {
        //     return $this->surname;
        // }
        // public function getEmail(): string {
        //     return $this->email;
        // }
        // public function setEmail(string $email) {
        //     $this->email = $email;
        // }
        
        // only getter and setter
        public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            } else {
                throw new \Exception("Undefined property: $property");
            }
        }
        public function __set($property, $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            } else {
                throw new \Exception("Undefined property: $property");
            }
        }

        public function __call($method, $args) {
            $property = lcfirst(substr($method, 3)); // Extract the property name from the method
            if (strncasecmp($method, 'get', 3) === 0) {
                if (property_exists($this, $property)) {
                    return $this->$property;
                } else {
                    throw new \Exception("Undefined property: $property");
                }
            } elseif (strncasecmp($method, 'set', 3) === 0) {
                if (property_exists($this, $property) && count($args) === 1) {
                    $this->$property = $args[0];
                } else {
                    throw new \Exception("Undefined property or invalid arguments for property: $property");
                }
            } else {
                throw new \Exception("Undefined method: $method");
            }
        }
    }
?>

