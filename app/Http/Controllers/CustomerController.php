<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    //

	public function listar(){


		$clientes = Customer::all();


	echo "<!DOCTYPE html>
		  <html>
  		  <head>
    	  <title>customers</title>
  		  </head>
  		  <body><p><div>";
    

	foreach ($clientes as $cliente) {

		echo "<h4> $cliente->lastname, $cliente->name, $cliente->email</h4><br />";
		
	}
	echo "</div></p></body></html>";
	}

}
