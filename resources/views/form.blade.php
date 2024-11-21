<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/FormStyles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <link rel="stylesheet" href="{{ asset('css/input.css') }}">
    <script src="{{ asset('js/Form.js') }}" defer></script>
    <title>Patient Registration</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <style>
        .nav-bar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        
        .user-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .logout-button {
            background-color: #ef4444;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
        }
        
        .logout-button:hover {
            background-color: #dc2626;
        }

        /* Add padding to account for fixed navbar */
        body {
            padding-top: 60px;
        }

        /* Updated styles for accordion content */
        .accordion-item-body-content {
            overflow-x: auto;
            width: 100%;
            padding-bottom: 1rem;
            padding-right: 2rem;
        }

        /* Make containers responsive with larger minimum width */
        .container1, .container2, .container3, .container4, .container5 {
            min-width: 2000px;
            padding-right: 3rem;
            margin: 0 auto;
        }

        /* Show scrollbar when screen is smaller than container */
        @media screen and (max-width: 2000px) {
            .accordion-item-body-content {
                overflow-x: scroll;
            }
        }

        /* Hide scrollbar when screen is larger than container */
        @media screen and (min-width: 2001px) {
            .accordion-item-body-content {
                overflow-x: visible;
            }
        }

        /* Style the scrollbar - only visible when needed */
        .accordion-item-body-content::-webkit-scrollbar {
            height: 8px;
        }

        .accordion-item-body-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .accordion-item-body-content::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        .accordion-item-body-content::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <nav class="nav-bar">
        <h1 class="text-xl font-bold">Patient Registration</h1>
        <div class="user-section">
            <span>Welcome, {{ Auth::user()->username }}</span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mx-auto px-6" style="max-width: 98%;">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <form id="form1" action="{{ route('form.submit') }}" method="POST">
        @csrf
    <div class="accordion">

        <div class="accordion-item">
        
                <div class="accordion-item-header">Personal Information
                    
                </div>
                <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            
                                <div class="container1" >
                                    <label for="Hospital-name" >Hospital name<span class="text-red-500">*</span></label>
                                    <label for="F-name">First name<span class="text-red-500">*</span></label>
                                    <label for="middle-name" >Middle name<span class="text-red-500">*</span></label>
                                    <label for="last-name" >Last name<span class="text-red-500">*</span></label>
                                
                                    <select name="hospital_name" id="Hospital-name" class="border-gray-500 border rounded" required >
                                    <option value="1">Acs</option>
                                    <option value="2">Other</option>
                                    </select>
                                    <input id="F-name" name="first_name"  type="text" class="border-gray-500 border rounded" placeholder="Enter first name" required minlength="3" maxlength="50">
                                    <input type="text" name="middle_name" class="border-gray-500 border rounded" placeholder="Enter middle name" required minlength="3" maxlength="50">
                                    <input type="text" name="last_name" class="border-gray-500 border rounded" placeholder="Enter last name" required minlength="3" maxlength="60">


                                    <label for="ID-type" >Identification type<span class="text-red-500">*</span></label>
                                    <label for="" >Identification number<span class="text-red-500">*</span></label>
                                    <label for="" >Phone number<span class="text-red-500">*</span></label>
                                    <label for="Gender" >Gender<span class="text-red-500">*</span></label>
                                    <select name="identification_type" id="ID-type" class="border-gray-500 border rounded" required onchange="InputConstraints('ID-type','ID-number')">
                                        <option disabled selected hidden>--Select Identification Type--</option>
                                        <option value="0">id</option>
                                        <option value="1">passport</option>
                                    </select>
                                    <input id="ID-number" name="identification_number" type="text" class="border-gray-500 border rounded" placeholder="Identification number" required>
                                    <input type="tel" name="phone_number" class="border-gray-500 border phone rounded" placeholder="Enter Phone number" pattern="[0-9]{9}" required name="phone">
                                    <select name="gender" id="Gender" class="border-gray-500 border rounded" required>
                                        <option value="" disabled selected hidden>--Select Gender--</option>
                                        <option value="0">female</option>
                                        <option value="1">male</option>
                                    </select>


                                    <label for="" >Date Of Birth<span class="text-red-500">*</span></label>
                                    <label for="" >Age</label>
                                    <label for="Relation" >Relation<span class="text-red-500">*</span></label>
                                    <label for="" >Active</label>
                                    <input id="dob1" type="date" name="date_of_birth" class="border-gray-500 border rounded" required onchange="calculateAge('dob1','result1')">
                                    <!--<select name="age" id="age">
                                         <option value="1">months</option> 
                                        <option value="2">years</option> 
                                    </select>-->
                                    <input id="result1" name="age" type="number" min="1" max="150" class="border-gray-500 border rounded" placeholder="Age" >
                                    <select name="relation" id="Relation" class="border-gray-500 border rounded" required>
                                        <option value="0">Common Law Spouse</option>
                                        <option value="1">Other</option>
                                    </select>
                                    <input type="checkbox" value="1" name="active">

                                </div>                        
                        </div>
                    </div>
        </div>

            <div class="accordion-item">
                <div class="accordion-item-header">Related Person Information
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <div class="container2">
                                <div class="one">
                                  <label for="R-F-name">First name<span class="text-red-500">*</span></label>
                                </div>
                                <div class="two">
                                   <input id="R-F-name" name="r_first_name" type="text" class="border-gray-500 border rounded" placeholder="Enter first name" required minlength="3" maxlength="50"> 
                                </div>
                                <div class="three">
                                    <label for="R-middle-name" >Middle name<span class="text-red-500">*</span></label>
                                </div>
                                <div class="four">
                                    <input type="text" name="r_middle_name" class="border-gray-500 border rounded" placeholder="Enter middle name" required minlength="3" maxlength="50">
                                </div>
                                <div class="five"><label for="R-last-name" >Last name<span class="text-red-500">*</span></label></div>
                                <div class="six"><input type="text" name="r_last_name" class="border-gray-500 border rounded" placeholder="Enter last name" required minlength="3" maxlength="60"></div>
                            </div>
                            <div class="container3">
                                <label for="ID-type" >Identification type<span class="text-red-500">*</span></label>
                                    <label for="" >Identification number<span class="text-red-500">*</span></label>
                                    <label for="" >Phone number<span class="text-red-500">*</span></label>
                                    <label for="Gender" >Gender<span class="text-red-500">*</span></label>

                                    <select name="r_identification_type" id="ID-type2" class="border-gray-500 border rounded" required onchange="InputConstraints('ID-type2','ID-number2')">
                                        <option disabled selected hidden>--Select Identification Type--</option>
                                        <option value="0">id</option>
                                        <option value="1">passport</option>
                                    </select>
                                    <input type="text" name="r_identification_number" id="ID-number2" class="border-gray-500 border rounded" placeholder="Identification number" required>
                                    <input type="tel" name="r_phone_number" class="border-gray-500 border phone rounded" placeholder="Enter Phone number" pattern="[0-9]{9}" required name="phone">
                                    <select name="r_gender" id="Gender" class="border-gray-500 border rounded" required>
                                        <option disabled selected hidden>--Select Gender--</option>
                                        <option value="0">female</option>
                                        <option value="1">male</option>
                                    </select>

                                <div class="container4">
                                    <div class="second-one"><label for="" >Date Of Birth<span class="text-red-500">*</span></label></div>
                                    <div class="second-two"><input name="r_date_of_birth" id="dob2" type="date" class="border-gray-500 border rounded" required onchange="calculateAge('dob2','result2')"></div>
                                    <div class="second-three"><label for="" >Age</label></div>
                                    <div class="second-four"><input name="r_age" id="result2" type="number" min="1" max="150" class="border-gray-500 border rounded" placeholder="Age" readonly></div>
                                    <div class="second-five"><label for="" >Active<span class="text-red-500">*</span></label></div>
                                    <div class="second-six"><input name="r_active" type="checkbox" value="1" required></div>
                                    <!--<select name="age" id="age">
                                         <option value="1">months</option>
                                        <option value="2">years</option> 
                                    </select>-->
                                    
                                    
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">Insurance Information
                </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <div class="container4">
                                <label for="company-name" >Insurance Company<span class="text-red-500">*</span></label>
                                <label for="network">Network</label>
                                <label for="">Member /policy Number</label>
                                <label for="">Status</label>
                                <select name="insurance_company" id="company-name" class="border-gray-500 border rounded" required >
                                    <option value="" disabled selected hidden>--Select Insurance Company--</option>
                                    <option value="0">company1</option>
                                    <option value="1">company2</option>
                                </select>
                                <input type="text" name="network" class="border-gray-500 border rounded" placeholder="INS">
                                <input type="text" name="member_policy_number" class="border-gray-500 border rounded" placeholder="Enter Number/ Policy Number">
                                <button id="status-btn" name="status" type="button" disabled style="cursor: not-allowed; opacity: 0.7;">New</button>
                                <div class="container5">
                                    <label for="class-type" id="item1" >Class Type<span class="text-red-500">*</span></label>
                                    <label for="name-class" id="item2">Name<span class="text-red-500">*</span></label>
                                    <label for="co-pay" id="item3">Co-Pay%<span class="text-red-500">*</span></label>
                                    <label for="co-ins" id="item4">Co-Ins%<span class="text-red-500">*</span></label>
                                    <label for="start-date" id="item5">Covarage Start date<span class="text-red-500">*</span></label>
                                    <label for="end-date" id="item6">Coverage End Date<span class="text-red-500">*</span></label>
                                    
                                    <select name="class_type" id="item7" class="border-gray-500 border rounded" required >
                                        <option value="" disabled selected hidden>--Select Class Type--</option>
                                        <option value="0">type1</option>
                                        <option value="1">type2</option>
                                    </select>
                                    <select name="name" id="item8" class="border-gray-500 border rounded" required >
                                        <option disabled selected hidden>--Select Class--</option>
                                        <option value="0">type1</option>
                                        <option value="1">type2</option>
                                    </select>
                                    <input type="text" name="co_pay" id="item9" class="border-gray-500 border rounded" placeholder="Enter Co-Pay%">
                                    <input type="text" name="co_ins" id="item10" class="border-gray-500 border rounded" readonly>
                                    <input type="date" name="coverage_start_date" id="item11" class="border-gray-500 border rounded">
                                    <input type="date" name="coverage_end_date" id="item12" class="border-gray-500 border rounded">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
     

            <div class="accordion-item">
                <div class="accordion-item-header">Benefits Information
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                        </div>
                </div>
            </div>
            <input type="submit" value="Save" class="save-button" >
    </div>

    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    </form>
</body>
</html>