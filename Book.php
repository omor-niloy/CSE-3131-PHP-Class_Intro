<?php
    class Book{
        public $isbn;
        public $title;
        public $author;
        public $available;

        public function __construct(int $isbn, string $title, string $author, int $available = 0) {
            $this->isbn = $isbn;
            $this->title = $title;
            $this->author = $author;
            $this->available = $available;
        }

        public function __toString() {
            $result = '<i>' . $this->title . '</i> - ' . $this->author;
            if (!$this->available) {
                $result .= ' <b>Not available</b>';
            }
            return $result;
        }

        // public function getIsbn(): int {
        //     return $this->isbn;
        // }
        // public function getTitle(): string {
        //     return $this->title;
        // }
        // public function getAuthor(): string {
        //     return $this->author;
        // }
        // public function isAvailable(): bool {
        //     return $this->available;
        // }
        public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
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
                if (property_exists($this, $property)) {
                    $this->$property = $args[0];
                } else {
                    throw new \Exception("Undefined property: $property");
                }
            }
        }

        public function getCopy(): bool{
            if ($this->available < 1) {
                return false;
            } else {
                $this->available--;
                return true;
            }
        }
        public function addCopy() {
            $this->available++;
        }
    }
?>
