<?php
namespace Domains\Customer\Commands;

class CreateCustomerCommand
{

    public string $Firstname;
    public string $Lastname;
    public string $DateOfBirth;
    public string $Email;
    public string $PhoneNumber;
    public string $BankAccountNumber;

    function __construct($Firstname, $Lastname, $DateOfBirth, $Email, $PhoneNumber, $BankAccountNumber)
    {
        $this->Firstname = $Firstname;
        $this->Lastname = $Lastname;
        $this->DateOfBirth = $DateOfBirth;
        $this->Email = $Email;
        $this->PhoneNumber = $PhoneNumber;
        $this->BankAccountNumber = $BankAccountNumber;
    }

}
