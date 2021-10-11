<?php
/*
S: Single-responsibility principle
O: Open-closed principle
L: Liskov substitution principle
I: Interface segregation principle
D: Dependency Inversion Principle

You will need...
an interface (for S, I and D)
a  base class that implements the interface (for S) 
one or more sub-classes of the base class (to demonstrate O and L)
some controller code with strict_types on and methods that expect parameters of the interface type
*/

interface DBConnection{
    public function connect();
}

class MySQLConnection implements DBConnection{
    public function connect(){
        
    }
}

?>