<!DOCTYPE html>
<?php
include("connect/connectDB.php"); // connection to db
error_reporting(0);
session_start();
if (empty($_SESSION['user_id']))  //if user is not login redirected baack to login page
{
  header('location:login.php');
} else {
?>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Civil Society Forum</title>
    <link rel="stylesheet" href="assets/nicepage.css" media="screen">
    <link rel="stylesheet" href="assets/register.css" media="screen">
    <script class="u-script" type="text/javascript" src="assets/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="assets/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 2.25.0, nicepage.com">

    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "",
        "url": "index.php"
      }
    </script>
    <meta property="og:title" content="register">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.php">
    <meta property="og:url" content="index.php">


    <script type="text/javascript">
      // module 1
      function showHideOtherTestedForCovid() {
        var noOption = document.getElementById("tested_covid").value;
        if (noOption == "Yes") {
          jQuery('#tested_covid-info').show();
          document.getElementById("tested_covid-info").style.visibility = 'visible';
          jQuery('#isolateInfo').hide();
          document.getElementById("isolateInfo").style.visibility = 'hidden';
          jQuery('#qualityCare').show();
          document.getElementById("qualityCare").style.visibility = 'vissible';
        } else {
          jQuery('#isolateInfo').show();
          document.getElementById("isolateInfo").style.visibility = 'visible';
          jQuery('#tested_covid-info').hide();
          document.getElementById("tested_covid-info").style.visibility = 'hidden';
          jQuery('#qualityCare').hide();
          document.getElementById("qualityCare").style.visibility = 'hidden';
        }
      }

      function showHideHospitalized() {
        var noOption = document.getElementById("which_hospital").value;
        if (noOption == "Private") {
          jQuery('#hospitalized-covid-info').show();
          document.getElementById("hospitalized-covid-info").style.visibility = 'visible';
          jQuery('#hospitalized-covid-inf').show();
          document.getElementById("hospitalized-covid-inf").style.visibility = 'visible';
        } else {
          jQuery('#hospitalized-covid-info').hide();
          document.getElementById("hospitalized-covid-info").style.visibility = 'hidden';
          jQuery('#hospitalized-covid-inf').hide();
          document.getElementById("hospitalized-covid-inf").style.visibility = 'hidden';
        }
      }

      function showHideOtherAccessToTest() {
        var noOption = document.getElementById("access_test").value;
        if (noOption == "Yes") {
          jQuery('#where-tested-info').show();
          document.getElementById("where-tested-info").style.visibility = 'visible';
          jQuery('#where-not-tested-info').hide();
          document.getElementById("where-not-tested-info").style.visibility = 'hidden';

        } else {
          jQuery('#where-tested-info').hide();
          document.getElementById("where-tested-info").style.visibility = 'hidden';
          jQuery('#where-not-tested-info').show();
          document.getElementById("where-not-tested-info").style.visibility = 'visible';
        }
      }


      function showHideYouHospitalized() {
        var noOption = document.getElementById("hospitalised").value;
        if (noOption == "Yes") {
          jQuery('#know-what-todo-info').show();
          document.getElementById("know-what-todo-info").style.visibility = 'visible';
        } else {
          jQuery('#know-what-todo-info').hide();
          document.getElementById("know-what-todo-info").style.visibility = 'hidden';
        }
      }

      function showHidequalityOfCare() {
        var noOption = document.getElementById("quality_of_care").value;
        if (noOption == "Yes") {
          jQuery('#services_impr_suggest_info').show();
          document.getElementById("services_impr_suggest_info").style.visibility = 'visible';
        } else {
          jQuery('#services_impr_suggest_info').hide();
          document.getElementById("services_impr_suggest_info").style.visibility = 'hidden';
        }
      }

      function showHideServiceSuportOther() {
        var noOption = document.getElementById("support_services").value;
        if (noOption == "Other") {
          jQuery('#support_services_info').show();
          document.getElementById("support_services_info").style.visibility = 'visible';
          jQuery('#services_improvement_info').hide();
          document.getElementById("services_improvement_info").style.visibility = 'hidden';
        } else {
          jQuery('#support_services_info').hide();
          document.getElementById("support_services_info").style.visibility = 'hidden';

          jQuery('#services_improvement_info').show();
          document.getElementById("services_improvement_info").style.visibility = 'visible';
        }
      }
      //Module 2
      function showHideSocialDistance() {
        var noOption = document.getElementById("social_distancing").value;
        if (noOption == "Yes") {
          jQuery('#socalDis').show();
          document.getElementById("socalDis").style.visibility = 'visible';
        } else {
          jQuery('#socalDis').hide();
          document.getElementById("socalDis").style.visibility = 'hidden';
        }
      }

      function showHideEmployementInfo() {
        var noOption = document.getElementById("applied_sassa").value;
        if (noOption == "Yes") {
          jQuery('#sassa-grant-info').show();
          document.getElementById("sassa-grant-info").style.visibility = 'visible';
        } else {
          jQuery('#sassa-grant-info').hide();
          document.getElementById("sassa-grant-info").style.visibility = 'hidden';
        }
      }

      function showHideEmploymentChanged() {
        var noOption = document.getElementById("changed_employment").value;
        if (noOption == "Yes") {
          jQuery('#employment-changed-info').show();
          document.getElementById("employment-changed-info").style.visibility = 'visible';
        } else {
          jQuery('#employment-changed-info').hide();
          document.getElementById("employment-changed-info").style.visibility = 'hidden';
        }
      }

      function showHideUnemploymentAssistance() {
        var noOption = document.getElementById("applied_assistance").value;
        if (noOption == "Yes") {
          jQuery('#applied_assistance-info').show();
          document.getElementById("applied_assistance-info").style.visibility = 'visible';
        } else {
          jQuery('#applied_assistance-info').hide();
          document.getElementById("applied_assistance-info").style.visibility = 'hidden';
        }
      }



      function showHideImproveHelthArea() {
        var noOption = document.getElementById("health_improvements").value;
        if (noOption == "Yes") {
          jQuery('#healthImprove').show();
          document.getElementById("healthImprove").style.visibility = 'visible';
        } else {
          jQuery('#healthImprove').hide();
          document.getElementById("healthImprove").style.visibility = 'hidden';
        }
      }

      function showHideTransportInfo() {
        var noOption = document.getElementById("travel_to_work").value;
        if (noOption != "Own car") {
          jQuery('#publicTransportInfo').show();
          document.getElementById("publicTransportInfo").style.visibility = 'visible';
          jQuery('#publicTransportInfo1').show();
          document.getElementById("publicTransportInfo1").style.visibility = 'visible';
        } else {
          jQuery('#publicTransportInfo').hide();
          document.getElementById("publicTransportInfo").style.visibility = 'hidden';
          jQuery('#publicTransportInfo1').hide();
          document.getElementById("publicTransportInfo1").style.visibility = 'hidden';
        }
      }

      function showHideOtherEarnALiving() {
        var noOption = document.getElementById("earning_living").value;
        if (noOption == "unemployed") {
          jQuery('#unemployed-info').show();
          document.getElementById("unemployed-info").style.visibility = 'visible';
        } else {
          jQuery('#unemployed-info').hide();
          document.getElementById("unemployed-info").style.visibility = 'hidden';
        }

        if (noOption == "self-employed") {
          jQuery('#self-employed-info').show();
          document.getElementById("self-employed-info").style.visibility = 'visible';
        } else {
          jQuery('#self-employed-info').hide();
          document.getElementById("self-employed-info").style.visibility = 'hidden';
        }

        jQuery('#employed-status-info').show();
        document.getElementById("employed-status-info").style.visibility = 'visible';
      }


      function showHideEmployAsstance() {
        var noOption = document.getElementById("which_grant").value;
        if (noOption == "Yes") {
          jQuery('#applicationSuccess').show();
          document.getElementById("applicationSuccess").style.visibility = 'visible';
        } else {
          jQuery('#applicationSuccess').hide();
          document.getElementById("applicationSuccess").style.visibility = 'hidden';
        }
      }

      function showHideEmployerActions() {
        var noOption = document.getElementById("employer_safe_environment").value;
        if (noOption == "Yes") {
          jQuery('#employer_Actions').show();
          document.getElementById("employer_Actions").style.visibility = 'visible';
        } else {
          jQuery('#employer_Actions').hide();
          document.getElementById("employer_Actions").style.visibility = 'hidden';
        }
      }

    function showHideDisabledPerson() {
      var noOption = document.getElementById("disable").value;
      if (noOption == "Yes") {
        jQuery('#disability_type-lbl').hide();
        document.getElementById("disability_type-lbl").style.visibility = 'hidden';
        jQuery('#disability_type-lbl').show();
        document.getElementById("disability_type-lbl").style.visibility = 'visible';               
      } else {
        jQuery('#disability_type-lbl').show();
        document.getElementById("disability_type-lbl").style.visibility = 'visible';
        jQuery('#disability_type-lbl').hide();
        document.getElementById("disability_type-lbl").style.visibility = 'hidden';
      }
    }

    </script>




    <style type="text/css">
      .DDlist {
        display: none;
      }
    </style>

    <script type="text/javascript">
      var categories = [];
      categories["startList"] = ["Western Cape", "Eastern Cape", 'Northern Cape', 'North West', 'Free State', 'Kwazulu Natal', 'Gauteng', 'Limpopo', 'Mpumalanga']; // Level 1  (True|False is 1 level only)

      categories["Western Cape"] = ["Cape Winelands District Municipality", "Central Karoo District Municipality", "Garden Route District Municipality", "Overberg District Municipality", "West Coast District Municipality", "City of Cape Town Metropolitan"];
      // Level 2
      categories["Cape Winelands District Municipality"] = ["Witzenberg", "Drakenstein", "Stellenbosch", "Breede Valley", "Langeberg"];
      categories["Central Karoo District Municipality"] = ["Laingsburg", "Prince Albert", "Beaufort West"];
      categories["Garden Route District Municipality"] = ["Kannaland", "Hessequa", "Mossel Bay", "George", "Oudtshoorn", "Bitou", "Knysna"];
      categories["Overberg District Municipality"] = ["Theewaterskloof", "Overstrand Cape", "Agulhas", "Swellendam"];
      categories["West Coast District Municipality"] = ["Matzikama", "Cederberg", "Bergrivier", "Saldanha Bay", "Swartland"];
      categories["City of Cape Town Metropolitan"] = ["City of Cape Town"];

      categories["Eastern Cape"] = ["Alfred Nzo District Municipality", "Amathole District Municipality", "Chris Hani District Municipality", "Joe Gqabi District Municipality", "OR Tambo District Municipality", "Sarah Baartman District Municipality", "Nelson Mandela Bay Metropolitan", "Buffalo City Metropolitan"]; // Level 2
      categories["Alfred Nzo District Municipality"] = ["Matatiele", "Mbizana", "Ntabankulu", "Umzimvubu"]; // Level 3 only
      categories["Amathole District Municipality"] = ["Mnquma", "Mbhashe", "Amahlathi", "Ngqushwa", "Great Kei", "Raymond Mhlaba"]; // Level 3 only
      categories["Chris Hani District Municipality"] = ["Intsika Yethu", "Enoch Mgijima", "Engcobo", "Emalahleni", "Inxuba Yethemba", "Sakhisizwe"];
      categories["Joe Gqabi District Municipality"] = ["Elundini", "Senqu", "Walter Sisulu"]; // Level 3 only
      categories["OR Tambo District Municipality"] = ["King Sabata Dalindyebo Local Municipality", "Nyandeni", "Ngquza Hill", "Mhlontlo", "Port St Johns"]; // Level 3 only
      categories["Sarah Baartman District Municipality"] = ["Blue Crane Route", "Dr Beyers Naudé", "Kou-Kamma", "Kouga", "Makana", "Ndlambe", "Sunday's River Valley"];
      categories["Buffalo City Metropolitan"] = ["Buffalo City"];
      categories["Nelson Mandela Bay Metropolitan"] = ["Nelson Mandela Bay Municipality"];

      categories["Northern Cape"] = ["Frances Baard District Municipality", "John Taolo Gaetsewe District Municipality", "Namakwa District Municipality", "Pixley ka Seme District Municipality", "ZF Mgcawu District Municipality"];
      categories["Frances Baard District Municipality"] = ["Sol Plaatje", "Dikgatlong", "Magareng", "Phokwane"];
      categories["John Taolo Gaetsewe District Municipality"] = ["Joe Morolong", "Ga-Segonyana", "Gamagara"];
      categories["Namakwa District Municipality"] = ["Richtersveld", "Nama Khoi", "Kamiesberg", "Hantam", "Karoo Hoogland", "Khâi-Ma"];
      categories["Pixley ka Seme District Municipality"] = ["Ubuntu", "Umsobomvu", "Emthanjeni", "Kareeberg", "Renosterberg", "Thembelihle", "Siyathemba", "Siyancuma"];
      categories["ZF Mgcawu District Municipality"] = ["Dawid Kruiper", "Kai ǃGarib", "ǃKheis", "Tsantsabane", "Kgatelopele"];

      categories["North West"] = ["Bojanala Platinum", "Ngaka Modiri Molema", "Dr Ruth Segomotsi Mompati", "Dr Kenneth Kaunda"];
      categories["Bojanala Platinum"] = ["Moretele", "Madibeng", "Rustenburg", "Kgetlengrivier", "Moses Kotane"];
      categories["Ngaka Modiri Molema"] = ["Ratlou", "Tswaing", "Mahikeng", "Ditsobotla", "Ramotshere"];
      categories["Dr Ruth Segomotsi Mompati"] = ["Naledi", "Mamusa", "Greater Taung", "Lekwa-Teemane", "Kagisano-Molopo"];
      categories["Dr Kenneth Kaunda"] = ["JB Marks", "Matlosana", "Maquassi Hills"];

      categories["Free State"] = ["Mangaung Metropolitan", "Fezile Dabi District", "Lejweleputswa District", "Thabo Mofutsanyana District", "Xhariep District"];
      categories["Mangaung Metropolitan"] = ["Mangaung Metropolitan Municipality"];
      categories["Fezile Dabi District"] = ["Moqhaka", "Ngwathe", "Metsimaholo", "Mafube"];
      categories["Lejweleputswa District"] = ["Masilonyana", "Tokologo", "Tswelopele", "Matjhabeng", "Nala"];
      categories["Thabo Mofutsanyana District"] = ["Setsoto", "Dihlabeng", "Nketoana", "Maluti-a-Phofung", "Phumelela", "Mantsopa"];
      categories["Xhariep District"] = ["Letsemeng", "Kopanong", "Mohokare", "Naledi"];

      categories["Kwazulu Natal"] = ["Amajuba District Municipality", "Harry Gwala District Municipality", "iLembe District Municipality", "King Cetshwayo District Municipality", "Ugu District Municipality", "uMgungundlovu District Municipality", "uMkhanyakude District Municipality", "uMzinyathi District Municipality", "uThukela District Municipality", "Zululand District Municipality", "eThekwini Metropolitan"];
      categories["Amajuba District Municipality"] = ["Dannhauser", "eMadlangeni", "Newcastle"];
      categories["Harry Gwala District Municipality"] = ["Dr Nkosazana Dlamini-Zuma", "Greater Kokstad", "Ubuhlebezwe", "Umzimkhulu"];
      categories["iLembe District Municipality"] = ["KwaDukuza", "Mandeni", "Maphumulo", "Ndwedwe"];
      categories["King Cetshwayo District Municipality"] = ["City of uMhlathuze", "Mthonjaneni", "Nkandla", "uMfolozi", "uMlalazi"];
      categories["Ugu District Municipality"] = ["Ray Nkonyeni", "uMdoni", "uMuziwabantu", "Umzumbe", "Vulamehlo"];
      categories["uMgungundlovu District Municipality"] = ["Impendle", "Mkhambathini", "Mpofana", "Msunduzi", "Richmond", "uMngeni", "uMshwathi"];
      categories["uMkhanyakude District Municipality"] = ["Big Five Hlabisa", "Jozini", "Mtubatuba", "uMhlabuyalingana"];
      categories["uMzinyathi District Municipality"] = ["Endumeni", "Msinga", "Nquthu", "Umvoti"];
      categories["uThukela District Municipality"] = ["Alfred Duma", "Inkosi Langalibalele", "Okhahlamba"];
      categories["Zululand District Municipality"] = ["Abaqulusi", "eDumbe", "Nongoma", "Ulundi", "uPhongolo"];
      categories["eThekwini Metropolitan"] = ["eThekwini Metropolitan Municipality"];

      categories["Gauteng"] = ["City of Johannesburg Metropolitan Municipality", "City of Tshwane Metropolitan Municipality", "Ekurhuleni Metropolitan Municipality", "Sedibeng District Municipality", "West Rand District Municipality"];
      categories["City of Johannesburg Metropolitan Municipality"] = ["Johannesburg"];
      categories["City of Tshwane Metropolitan Municipality"] = ["Tshwane"];
      categories["Ekurhuleni Metropolitan Municipality"] = ["Ekurhuleni"];
      categories["Sedibeng District Municipality"] = ["Emfuleni", "Lesedi", "Midvaal"];
      categories["West Rand District Municipality"] = ["Merafong City", "Mogale City", "Rand West City"];

      categories["Limpopo"] = ["Capricorn District Municipality", "Mopani District Municipality", "Sekhukhune District Municipality", "Vhembe District Municipality", "Waterberg District Municipality"];
      categories["Capricorn District Municipality"] = ["Blouberg", "Lepelle-Nkumpi", "Molemole", "Polokwane"];
      categories["Mopani District Municipality"] = ["Ba-Phalaborwa", "Greater Giyani", "Greater Letaba", "Greater Tzaneen", "Maruleng"];
      categories["Sekhukhune District Municipality"] = ["Elias Motsoaledi", "Ephraim Mogale", "Fetakgomo/Tubatse", "Makhuduthamaga"];
      categories["Vhembe District Municipality"] = ["Collins Chabane", "Makhado", "Musina", "Thulamela"];
      categories["Waterberg District Municipality"] = ["Bela-Bela", "Lephalale", "Mogalakwena", "Mookgophong/Modimolle", "Thabazimbi"];

      categories["Mpumalanga"] = ["Gert Sibande", "Nkangala", "Ehlanzeni"];
      categories["Gert Sibande"] = ["Albert Luthuli", "Msukaligwa", "Mkhondo", "Pixley ka Seme", "Lekwa", "Dipaleseng", "Govan Mbeki"];
      categories["Nkangala"] = ["Victor Khanye", "Emalahleni", "Steve Tshwete", "Emakhazeni", "Thembisile Hani", "Dr JS Moroka"];
      categories["Ehlanzeni"] = ["Thaba Chweu", "Mbombela", "Umjindi", "Nkomazi", "Bushbuckridge"];


      var nLists = 3; // number of lists in the set

      function fillSelect(currCat, currList) {
        var step = Number(currList.name.replace(/\D/g, ""));
        for (i = step; i < nLists + 1; i++) {
          document.forms[0]['List' + i].length = 1;
          document.forms[0]['List' + i].selectedIndex = 0;
          document.getElementById('List' + i).style.display = 'none';
          var firstP = document.getElementById('List' + i);
        }
        var nCat = categories[currCat];
        if (nCat != undefined) {
          document.getElementById('List' + step).style.display = 'inline';
          for (each in nCat) {
            var nOption = document.createElement('option');
            var nData = document.createTextNode(nCat[each]);
            nOption.setAttribute('value', nCat[each]);
            nOption.appendChild(nData);
            currList.appendChild(nOption);
          }
        }
      }

      function getValues() {
        var str = '';
        str += document.getElementById('List1').value + '\n';
        for (var i = 2; i <= nLists; i++) {
          if (document.getElementById('List' + i).selectedIndex != 0) {
            str += document.getElementById('List' + i).value + '\n';
          }
        }
        alert(str);
      }

      function init() {
        fillSelect('startList', document.forms[0]['List1']);
      }

      navigator.appName == "Microsoft Internet Explorer" ?
        attachEvent('onload', init, false) :
        addEventListener('load', init, false);
    </script>
  </head>

  <body class="u-body">
    <header class="u-clearfix u-header u-image u-header" id="sec-0e3f" data-image-width="2407" data-image-height="586">
      <div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg>
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
              </svg>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                  <symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;">
                    <rect y="1" width="16" height="2"></rect>
                    <rect y="7" width="16" height="2"></rect>
                    <rect y="13" width="16" height="2"></rect>
                  </symbol>
                </defs>
              </svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1">
              <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="index.php" style="padding: 10px 32px;">Home</a>
              </li>
              <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="about.php" style="padding: 10px 32px;">About Community Constituency</a>
              </li>
              <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="survey.php" style="padding: 10px 32px;">Survey</a>
              </li>
              <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="contact.php" style="padding: 10px 32px;">Contact Us</a>
              </li>
              <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="profile.php" style="padding: 10px 32px;">Profile</a>
              </li>
              <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="logout.php" style="padding: 10px 32px;">Logout</a>
              </li>
               
            </ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php" style="padding: 10px 32px;">Home</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="about.php" style="padding: 10px 32px;">About Community Constituency</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="survey.php" style="padding: 10px 32px;">Survey</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="contact.php" style="padding: 10px 32px;">Contact Us</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="register.php" style="padding: 10px 32px;">Register</a>
                </li>
              </ul>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div>
    </header>



    <?php

    if (isset($_POST['submit'])) //if submit btn is pressed
    {
      if (
        empty($_POST['first_name']) ||
        empty($_POST['surname']) ||
        empty($_POST['date_of_birth']) ||
        empty($_POST['age']) ||
        empty($_POST['cellnumber']) ||
        empty($_POST['email']) ||
        empty($_POST['race']) ||
        empty($_POST['religion']) ||
        empty($_POST['sex']) ||
        empty($_POST['sexuality']) ||
        empty($_POST['gender']) ||
        empty($_POST['prefix']) ||
        empty($_POST['pronouns']) ||
        empty($_POST['home_address']) ||
        empty($_POST['List1']) ||     // Province        
        empty($_POST['List2']) ||     // District
        empty($_POST['List3']) ||     // Municipality
        empty($_POST['alternate_person']) ||
        empty($_POST['alternate_number'])
      ) {
        $message = "Please make sure all fields required have been properly completed!";
      } else {

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $reference = substr(str_shuffle($permitted_chars), 0, 10);
        $project = $_SESSION['project'];
        $agent_id = $_SESSION['user_id'];


        $agent_email = $_POST['email'];
        $agent_name = $_POST['first_name'];

        if (true) {
          include("./agent_welcome_mail.php");
        }


        //inserting values into 'summary_tbl' db
        $sumsql = "INSERT INTO summary_tbl
      (unique_code, agent_id,  province, district, municipality, project_name, respondant_name, respondant_surname, respondant_phone, respondant_email)
      VALUES 
      ('" . $reference . "', '" . $agent_id . "', '" . $_POST['List1'] . "', '" . $_POST['List2'] . "', '" . $_POST['List3'] . "', '" . $project . "', '" . $_POST['first_name'] . "', '" . $_POST['surname'] . "', '" . $_POST['cellnumber'] . "', '" . $_POST['email'] . "')";

        mysqli_query($db, $sumsql);

        $summary_tbl_sql = mysqli_query($db, "SELECT summary_id FROM summary_tbl where unique_code = '" . $reference . "' ");

        while ($row = mysqli_fetch_array($summary_tbl_sql)) {
          $summary_tbl_id = $row['summary_id'];
        }


        //inserting values into 'respondant_contact_tbl' db
        $rcsql = "INSERT INTO respondant_contact_tbl
      (first_name, surname, date_of_birth, age, cellnumber, email, race, religion, sex, sexuality, gender, prefix, pronouns, home_address, province, district, municipality, alternate_person, alternate_number, unique_code, summary_id, disable, disability_type)
      VALUES 
      ('" . $_POST['first_name'] . "', '" . $_POST['surname'] . "', '" . $_POST['date_of_birth'] . "', '" . $_POST['age'] . "', '" . $_POST['cellnumber'] . "', '" . $_POST['email'] . "', '" . $_POST['race'] . "', '" . $_POST['religion'] . "', '" . $_POST['sex'] . "', '" . $_POST['sexuality'] . "', '" . $_POST['gender'] . "', '" . $_POST['prefix'] . "', '" . $_POST['pronouns'] . "', '" . $_POST['home_address'] . "', '" . $_POST['List1'] . "', '" . $_POST['List2'] . "', '" . $_POST['List3'] . "', '" . $_POST['alternate_person'] . "', '" . $_POST['alternate_number'] . "', '$reference', '$summary_tbl_id', '" . $_POST['disable'] . "', '" . $_POST['disability_type'] . "')";

        mysqli_query($db, $rcsql);


        //inserting values into 'surviving_covid_tbl' db
        $svsql = "INSERT INTO surviving_covid_tbl
      (tested_covid, access_test, why_no_test, which_hospital, result_duration, hospitalised, isolate_info, know_what_to_do, support_services, support_requre, quality_of_care, do_quality_care, covid_experience, unique_code, summary_id)
      VALUES 
      ('" . $_POST['tested_covid'] . "', '" . $_POST['access_test'] . "', '" . $_POST['why_no_test'] . "', '" . $_POST['which_hospital'] . "', '" . $_POST['result_duration'] . "', '" . $_POST['hospitalised'] . "', '" . $_POST['isolate_info'] . "', '" . $_POST['know_what_to_do'] . "', '" . $_POST['support_services'] . "', '" . $_POST['support_requre'] . "', '" . $_POST['quality_of_care'] . "', '" . $_POST['do_quality_care'] . "', '" . $_POST['covid_experience'] . "', '$reference', '$summary_tbl_id')";

        mysqli_query($db, $svsql);


        //inserting values into 'social_behaviour_tbl' db
        $sbSql = "INSERT INTO social_behaviour_tbl
      (unique_code, family, worship, friends, work, shopping, travel, lifestyle_changes, social_distancing, family_social_distancing, see_friends, exercise, healthy_food, health_improvements, health_improvements_details, summary_id)
       VALUES 
        ('$reference','" . $_POST['family'] . "','" . $_POST['worship'] . "','" . $_POST['friends'] . "','" . $_POST['work'] . "','" . $_POST['shopping'] . "','" . $_POST['travel'] . "','" . $_POST['lifestyle_changes'] . "','" . $_POST['social_distancing'] . "','" . $_POST['family_social_distancing'] . "','" . $_POST['see_friends'] . "', '" . $_POST['exercise'] . "','" . $_POST['healthy_food'] . "','" . $_POST['health_improvements'] . "','" . $_POST['health_improvements_details'] . "','$summary_tbl_id')";

        mysqli_query($db, $sbSql);

        //inserting values into 'public_facilities_tbl' db
        //
        $pfSql = " INSERT INTO public_facilities_tbl (unique_code, summary_id, access_to_essentials, earning_living, changed_employment, government_support, applied_sassa, which_grant, applied_assistance, application_success) 
          VALUES
            ('$reference','$summary_tbl_id','" . $_POST['access_to_essentials'] . "','" . $_POST['earning_living'] . "','" . $_POST['changed_employment'] . "','" . $_POST['government_support'] . "','" . $_POST['applied_sassa'] . "','" . $_POST['which_grant'] . "','" . $_POST['applied_assistance'] . "','" . $_POST['application_success'] . "')";

        mysqli_query($db, $pfSql);


        //inserting values into 'work_safety_tbl' db
        $wsSql = " INSERT INTO  work_safety_tbl (unique_code ,  summary_id ,  employer_safe_environment ,  employer_measures ,  workplace_guidelines ,  access_infomation ,  travel_to_work ,  public_transport ,  public_transport_measures )
      VALUES
        ('$reference','$summary_tbl_id','" . $_POST['employer_safe_environment'] . "','" . $_POST['employer_measures'] . "','" . $_POST['workplace_guidelines'] . "','" . $_POST['access_infomation'] . "','" . $_POST['travel_to_work'] . "','" . $_POST['public_transport'] . "','" . $_POST['public_transport_measures'] . "')";

        mysqli_query($db, $wsSql);

        $success = "<br>Congradulations... Community Constituency Survey Completed successfully! <p>You will be redirected in <span id='counter'>5</span> second(s).</p>
            <script type='text/javascript'>
                function countdown() {
                  var i = document.getElementById('counter');
                  if (parseInt(i.innerHTML)<=0) {
                    location.href = 'index.php';
                  }
                  i.innerHTML = parseInt(i.innerHTML)-1;
                }
                setInterval(function(){ countdown(); },1000);
                </script>'";

        header("refresh:5;url=index.php"); // redireted once inserted success
      }
    }

    ?>

    <section class="u-align-center u-clearfix u-section-1" id="carousel_2125">

      <div class="container">
        <a href="#" class="active">
          <?php if (!empty($message)) { ?>
            <span style="color:red;">
              <?php echo $message; ?>
            <?php  } ?>
            </span>
            <span style="color:green;">
              <?php echo $success; ?>
            </span>
        </a>
      </div>

      <div class="u-clearfix u-sheet u-sheet-1">

        <img class="u-expand-resize u-image u-image-1" src="images/diversegroupofcharacters.png" width="1120" height="370">

        <div class="u-form u-form-1">
          <div align="center">
            <h2 class="u-align-center u-text u-text-default u-text-3">
              <span style="font-weight: normal;">COVID-19 Survey</span>
            </h2>
          </div>


          <form action="" method="post">

            <div align="center">
              <h3 class="u-align-center u-text u-text-default u-text-3">
                <span style="font-weight: normal;">Respondent's details</span>
              </h3>
            </div>

            <div class="row">

              <div class="col-sm-6">
                <!-- Left -->
                <div class="u-form-group u-form-partition-factor-2 u-form-phone u-form-group-2">
                  <label for="firstname_lbl" class="u-label">First Names (*)</label>
                  <input type="text" placeholder="Enter your first names" id="first_name" name="first_name" class="u-grey-5 u-input u-input-rectangle" spellcheck="false">
                </div>
              </div>

              <div class="col-sm-6">
                   <!-- Right -->
                <div class="u-form-group u-form-partition-factor-2 u-form-phone u-form-group-2">
                  <label for="surname_lbl" class="u-label">Surname (*)</label>
                  <input type="text" placeholder="Enter your first names" id="surname" name="surname" class="u-grey-5 u-input u-input-rectangle" spellcheck="false">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="u-form-date u-form-group u-form-partition-factor-2 u-form-group-3">
                  <label for="date_of_birth_lbl" class="u-label">Date of birth</label>
                  <input type="date" placeholder="MM/DD/YYYY" id="date_of_birth" name="date_of_birth" class="u-grey-5 u-input u-input-rectangle">
                </div>
              </div>


              <div class="col-sm-6">
                <div class="u-form-group u-form-partition-factor-2 u-form-group-6">
                  <label for="cellnumber_lbl" class="u-label"> Cellphone number</label>
                  <input type="tel" pattern="\+?\d{0,2}[\s\(\-]?([0-9]{3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})" placeholder="Enter your Cellphone number" id="cellnumber" name="cellnumber" class="u-grey-5 u-input u-input-rectangle">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-7">
                  <label for="email_lbl" class="u-label">Email Address</label>
                  <input type="email" placeholder="Enter a valid email address" id="email" name="email" class="u-grey-5 u-input u-input-rectangle">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="u-form-group u-form-partition-factor-2 u-form-group-5">
                  <label for="age_lbl" class="u-label">Age </label>
                  <input type="text" placeholder="Enter your age" id="age" name="age" class="u-grey-5 u-input u-input-rectangle" spellcheck="false">
                </div>
              </div>


              <div class="col-sm-6">
                <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                  <label for="race_lbl" class="u-label">Race</label>
                  <div class="u-form-select-wrapper">
                    <select id="race" name="race" class="u-grey-5 u-input u-input-rectangle">
                      <option value=""></option>
                      <option selected value="Black">African (Black)</option>
                      <option value="Asian">Asian</option>
                      <option value="Colored">Colored</option>
                      <option value="Indian">Indian</option>
                      <option value="White">White</option>
                      <option value="Other">Other</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                      <path fill="currentColor" d="M4 8L0 4h8z"></path>
                    </svg>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="religion_lbl" class="u-label">Religion</label>
                <div class="u-form-select-wrapper">
                  <select id="religion" name="religion" class="u-grey-5 u-input u-input-rectangle">
                    <option value=""></option>
                    <option selected value="Christian">Christian</option>
                    <option value="Islam">Islam</option>
                    <option value="Hinduism">Hinduism</option>
                    <option value="African Traditions">African Traditions</option>
                    <option value="Judaism">Judaism</option>
                    <option value="Other">Other</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                    <path fill="currentColor" d="M4 8L0 4h8z"></path>
                  </svg>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="sexuality_lbl" class="u-label">Sexuality</label>
                <div class="u-form-select-wrapper">
                  <select id="sexuality" name="sexuality" class="u-grey-5 u-input u-input-rectangle">
                    <option value=""></option>
                    <option value="Bisexual">Bisexual</option>
                    <option value="Heterosexual">Heterosexual</option>
                    <option value="Homosexual">Homosexual</option>
                    <option selected value="prefer-not">Prefer not to say</option>
                    <option value="Other">Other</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                    <path fill="currentColor" d="M4 8L0 4h8z"></path>
                  </svg>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
                <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="sex_lbl" class="u-label">Sex Composition</label>
                <div class="u-form-select-wrapper">
                  <select id="sex" name="sex" class="u-grey-5 u-input u-input-rectangle">
                    <option value=""></option>
                    <option selected value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Intersex">Intersex</option>
                    <option value="prefer-not">Prefer not to say</option>
                    <option value="Other">Other</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                    <path fill="currentColor" d="M4 8L0 4h8z"></path>
                  </svg>
                </div>
              </div>
            </div>


            <div class="col-sm-6">            
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="gender_lbl" class="u-label">Gender</label>
                <div class="u-form-select-wrapper">
                  <select id="gender" name="gender" class="u-grey-5 u-input u-input-rectangle" required="required">
                    <option value=""></option>
                    <option selected value="Cisgender">Cisgender</option>
                    <option value="Gender Non-Confirming">Gender Non-Confirming</option>
                    <option value="Transgender">Transgender</option>
                    <option value="Queer/ Questioning">Queer/ Questioning</option>
                    <option value="prefer-not">Prefer not to say</option>
                    <option value="Other">Other</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                    <path fill="currentColor" d="M4 8L0 4h8z"></path>
                  </svg>
                </div>
              </div>
            </div>


            <div class="col-sm-6">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="pronouns_lbl" class="u-label">Pronouns</label>
                <div class="u-form-select-wrapper">
                  <select id="pronouns" name="pronouns" class="u-grey-5 u-input u-input-rectangle">
                    <option value=""></option>
                    <option selected value="he">He </option>
                    <option value="him">Him</option>
                    <option value="they">They</option>
                    <option value="them">Them</option>
                    <option value="she">She</option>
                    <option value="her">Her</option>
                    <option value="Other">Other</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                    <path fill="currentColor" d="M4 8L0 4h8z"></path>
                  </svg>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="prefix_lbl" class="u-label">Prefix</label>
                <div class="u-form-select-wrapper">
                  <select id="prefix" name="prefix" class="u-grey-5 u-input u-input-rectangle">
                    <option value=""></option>
                    <option selected value="mr">Mr</option>
                    <option value="mrs">Mrs</option>
                    <option value="miss">Miss</option>
                    <option value="dr">Dr</option>
                    <option value="prof">Professor</option>
                    <option value="Other">Other</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                    <path fill="currentColor" d="M4 8L0 4h8z"></path>
                  </svg>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" >
                <label for="disable-lbl" class="u-label">Do you have a disability?</label>
                <select id="disable" name="disable" class="u-grey-5 u-input u-input-rectangle" value="No" class="form-control unit" onchange="showHideDisabledPerson(this.value)">
                  <option  value=""></option>
                  <option value="Yes">Yes</option>
                  <option selected value="No">No</option>
                </select>
              </div> 
            </div>              

            <div class="col-sm-12">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="disability_type-lbl" style="display:none">
                <label for="disability_type" class="u-label">Disability type</label>
                <select id="disability_type" name="disability_type" class="u-grey-5 u-input u-input-rectangle" value="None" class="form-control unit" >
                  <option  value=""></option>
                  <option value="vision-impairment">Vision Impairment</option>
                  <option value="deaf">Deaf or hard of hearing</option>
                  <option value="mental-health">Mental health conditions</option>
                  <option value="intellectual-disability">Intellectual disability acquired brain injury</option>
                  <option value="autism">Autism spectrum disorder</option>
                  <option value="physical-disability">Physical disability</option>
                  <option value="other">Other</option>
                </select>
              </div>
            </div>


            <div class="col-sm-12">
              <div class="u-form-group u-form-select u-form-group-20">
                <label for="municipality">Location Selection (*)</label>
                <div style="width:100%">

                  <select class="u-grey-5 u-input u-input-rectangle u-input-14" size="1" name='List1' id="List1" onchange="fillSelect(this.value,this.form['List2'])" required>
                    <option selected value="">Select Province</option>
                  </select> &nbsp;
                  <select class="u-grey-5 u-input u-input-rectangle u-input-14" size="1" name='List2' id="List2" onchange="fillSelect(this.value,this.form['List3'])" class="DDlist" required>
                    <option selected value="">Select District</option>
                  </select> &nbsp;
                  <select class="u-grey-5 u-input u-input-rectangle u-input-14" size="1" name='List3' id="List3" onchange="fillSelect(this.value,this.form['List4'])" class="DDlist" required>
                    <option selected value="">Choose Municipality</option>
                  </select> &nbsp;
                </div>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="u-form-group u-form-message u-form-group-13">
                <label for="home_address_lbl" class="u-label">Home Address</label>
                <textarea placeholder="Enter your address" rows="4" cols="50" id="home_address" name="home_address" class="u-grey-5 u-input u-input-rectangle" spellcheck="false"></textarea>
              </div>
            </div>


            <div class="col-sm-6">
              <div class="u-form-group u-form-partition-factor-2 u-form-group-17">
                <label for="alternate_person_lbl" class="u-label">Alternative Contact Person (*)</label>
                <input type="text" placeholder="Enter an alternate contact person" id="alternate_person" name="alternate_person" class="u-grey-5 u-input u-input-rectangle">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="u-form-group u-form-partition-factor-2 u-form-group-18">
                <label for="alternate_number_lbl" class="u-label">Alternative Contact Number (*)</label>
                <input type="text" id="alternate_number" name="alternate_number" class="u-grey-5 u-input u-input-rectangle" placeholder="Enter an alternative contact number">
              </div>
              </div>
            </div>


              <div class="u-form-group u-form-select u-form-group-20">
                <br>
                <h3>Module 1: Surviving Covid-19</h3>
                <br>
              </div>



              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="tested_covid" class="u-label">Have you tested positive for Covid-19?</label>
                <select id="tested_covid" name="tested_covid" class="u-grey-5 u-input u-input-rectangle" class="form-control unit" required onchange="showHideOtherTestedForCovid(this.value)">
                  <option  value=""></option>
                  <option value="Yes">Yes</option>
                  <option selected value="No">No</option>
                  <option value="Unsure">Unsure</option>
                </select>
              </div>


              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="tested_covid-info" style="display:none">
                <label for="access_test" class="u-label">Did you access a Test?</label>
                <select id="access_test" name="access_test" class="u-grey-5 u-input u-input-rectangle" class="form-control unit" onchange="showHideOtherAccessToTest(this.value)">
                  <option selected value=""></option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                  <option value="Unsure">Unsure</option>
                </select>
              </div>

              <div class="u-form-group u-form-group-24" id="where-not-tested-info" style="display:none">
                <label for="why_no_test" class="u-label">Please share your challenges why you did not test with
                  COVID-19</label>
                <textarea placeholder="please share your challenges why you did not test" rows="4" cols="50" id="why_no_test" name="why_no_test" class="u-grey-5 u-input u-input-rectangle"></textarea>
              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="where-tested-info" style="display:none">
                <label for="which_hospital" class="u-label">Where did you access the test?</label>
                <select id="which_hospital" name="which_hospital" class="u-grey-5 u-input u-input-rectangle" class="form-control unit" onchange="showHideHospitalized(this.value)">
                  <option selected value=""></option>
                  <option value="Private">Private Sector</option>
                  <option value="Public">Public sector</option>
                </select>
              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="hospitalized-covid-inf" style="display:none">
                <label for="result_duration" class="u-label">How long did you wait for your test results? </label>
                <select id="result_duration" name="result_duration" class="u-grey-5 u-input u-input-rectangle" class="form-control unit">
                  <option selected value=""></option>
                  <option value="less-than-week">Less than a week</option>
                  <option value="less-than-two-weeks">Less than two weeks</option>
                  <option value="over-two-weeks">Over two weeks</option>
                  <option value="cant-remember">Can't remember</option>
                </select>
              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="hospitalized-covid-info" style="display:none">
                <label for="hospitalised" class="u-label">Were you hospitalised for Covid-19? </label>
                <select id="hospitalised" name="hospitalised" class="u-grey-5 u-input u-input-rectangle" class="form-control unit" onchange="showHideYouHospitalized(this.value)">
                  <option selected value=""></option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>


              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="isolateInfo" style="display:none">
                <label for="isolateInfo" class="u-label">How did you manage to self isolate. Choose relevant answer? </label>
                <select id="isolate_info" name="isolate_info" class="u-grey-5 u-input u-input-rectangle" class="form-control unit">
                  <option selected value=""></option>
                  <option value="isolated-in-house">Isolated in my own household</option>
                  <option value="isolated-outside-house">Isolated in a separate dwelling outside of my usual house
                  </option>
                  <option value="not-isolated">I did not self-isolate</option>
                  <option value="other">Other</option>
                </select>
              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="know-what-todo-info" style="display:none">
                <label for="know_what_to_do" class="u-label">Do you know what to do now that you have survived
                  Covid-19?</label>
                <select id="know_what_to_do" name="know_what_to_do" class="u-grey-5 u-input u-input-rectangle" class="form-control unit">
                  <option selected value=""></option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>


              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="support_services" class="u-label">Do you have access to support services?</label>
                <select id="support_services" name="support_services" class="u-grey-5 u-input u-input-rectangle" onchange="showHideServiceSuportOther(this.value)">
                
                  <option selected value="Counselling support">Counselling support</option>
                  <option value="Physical rehabilitation">Physical rehabilitation</option>
                  <option value="Access to disability grant">Access to disability grant</option>
                  <option value="Assistance to access medication">Assistance to access medication</option>
                  <option value="Information on how to sustain health and wellness">Information on how to sustain health
                    &amp; wellness</option>
                  <option value="Other">Other</option>
                </select>
              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="qualityCare" style="display:none">
                <label for="quality_of_care" class="u-label">Would you improve the quality of care you got for
                  COVID-19?</label>
                <select id="quality_of_care" name="quality_of_care" class="u-grey-5 u-input u-input-rectangle" class="form-control unit" onchange="showHidequalityOfCare(this.value)">
                  <option selected value=""></option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
              <div class="u-form-group u-form-message u-form-group-13" id="support_services_info" style="display:none">
                <label for="support_requre" class="u-label">Provide more details on the type of support you require</label>
                <textarea placeholder="more details on the type of support " rows="4" cols="50" id="support_requre" name="support_requre" class="u-grey-5 u-input u-input-rectangle" spellcheck="false"></textarea>
              </div>

              <div class="u-form-group u-form-message u-form-group-13" id="services_impr_suggest_info" style="display:none">
                <label for="do_quality_care" class="u-label">What would improve the quality of care you got for COVID-19?</label>
                <textarea placeholder="more details on the type of support " rows="4" cols="50" id="do_quality_care" name="do_quality_care" class="u-grey-5 u-input u-input-rectangle" spellcheck="false"></textarea>
              </div>

              <div class="u-form-group u-form-message u-form-group-13">
                <label for="covid_experience" class="u-label">Please share any experiences you have regarding COVID-related stigma? </label>
                <textarea placeholder="more details on the type of support " rows="4" cols="50" id="covid_experience" name="covid_experience" class="u-grey-5 u-input u-input-rectangle" spellcheck="false"></textarea>
              </div>

              <div class="u-form-group u-form-select u-form-group-20">
                <br>
                <h3>Module 2: Social and behaviour change</h3>
                <br>

              </div>

              
            
              <div class="u-form-group u-form-select u-form-group-13">
                <label for="select-07f8" class="u-label">What lifestyle changes do you think you need to make in order to make sure that you are safe from Covid-19? Tick all areas that apply</label>
                <div class="u-form-wrapper" style="text-align: left;"><br>
                  <input type="checkbox" name="family" id="family" value="Yes">
                  <label for="family">How I spend time with my family</label><br>
                  <input type="checkbox" name="worship" id="worship" value="Yes">
                  <label for="worship">How I attend places of worship</label><br>
                  <input type="checkbox" name="friends" id="friends" value="Yes">
                  <label for="friends">How I socialise with friends</label><br>
                  <input type="checkbox" name="work" id="work" value="Yes">
                  <label for="work">How I conduct myself at work</label><br>
                  <input type="checkbox" name="shopping" id="shopping" value="Yes">
                  <label for="shopping">Where I go for shopping</label><br>
                  <input type="checkbox" name="travel" id="travel" value="Yes">
                  <label for="travel">Places outside of my community that I will travel to</label><br> 
                </div>
              </div>


              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10"><br>
                <label for="social_distancing" class="u-label">Are you practising social distancing when you are in public?</label>
                <select id="social_distancing" name="social_distancing" class="u-grey-5 u-input u-input-rectangle" onchange="showHideSocialDistance(this.value)">
                  
                  <option value="Yes">Yes</option>
                  <option selected value="No">No</option>
                  <option value="Most times">Most times</option>
                  <option value="Sometimes">Sometimes</option>
                </select>
              </div>
       

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="healthy_food" class="u-label">How many healthy foods do you eat now as compared to before
                  COVID-19 Lockdown in February/March of this year?</label>
                <select id="healthy_food" name="healthy_food" class="u-grey-5 u-input u-input-rectangle">
                 
                  <option value="Much less">Much less</option>
                  <option value="Less">Less</option>
                  <option selected value="The same">The same</option>
                  <option value="More">More</option>
                  <option value="Much more">Much more</option>
                </select>
              </div>
 
 

              <div class="u-form-group u-form-message u-form-group-13">
                <label for="lifestyle_changes" class="u-label">Any other lifestyle changes? </label>
                <textarea placeholder="more details on other lifestyle changes " rows="4" cols="50" id="lifestyle_changes" name="lifestyle_changes" class="u-grey-5 u-input u-input-rectangle" spellcheck="false"></textarea>
              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10"><br>
                <label for="social_distancing" class="u-label">Are you practising social distancing when you are in public?</label>
                <select id="social_distancing" name="social_distancing" class="u-grey-5 u-input u-input-rectangle" onchange="showHideSocialDistance(this.value)">
                
                  <option value="Yes">Yes</option>
                  <option selected value="No">No</option>
                  <option value="Most times">Most times</option>
                  <option value="Sometimes">Sometimes</option>
                </select>
              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="see_friends" class="u-label">How much do you see friends now as compared to before COVID-19
                  Lockdown in February/March of this year?</label>
                <select id="see_friends" name="see_friends" class="u-grey-5 u-input u-input-rectangle">
              
                  <option value="Much less">Much less</option>
                  <option value="Less">Less</option>
                  <option selected value="The same">The same</option>
                  <option value="More">More</option>
                  <option value="Much more">Much more</option>
                </select>
              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="exercise" class="u-label">How much exercise do you take now as compared to before COVID-19
                  Lockdown in February/March of this year?</label>
                <select id="exercise" name="exercise" class="u-grey-5 u-input u-input-rectangle">
                  
                  <option value="Much less">Much less</option>
                  <option value="Less">Less</option>
                  <option selected value="The same">The same</option>
                  <option value="More">More</option>
                  <option value="Much more">Much more</option>
                </select>
              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="health_improvements" class="u-label">Have you taken any steps to improve your health?</label>
                <select id="health_improvements" name="health_improvements" class="u-grey-5 u-input u-input-rectangle" onchange="showHideImproveHelthArea(this.value);">
                 
                  <option value="Yes">Yes</option>
                  <option selected value="No">No</option>
                  <option value="Somewhat">Somewhat</option>
                </select>
              </div>


            <div class="u-form-group u-form-message u-form-group-13">
                <label for="health_improvements_details" class="u-label">Details for things you are doing to improve your health </label>
                <textarea placeholder="Please enter details" rows="4" cols="50" id="health_improvements_details" name="health_improvements_details" class="u-grey-5 u-input u-input-rectangle" spellcheck="false"></textarea>
            </div>
            

            <div class="u-form-group u-form-select u-form-group-20">
                <h3>Module 3: Access to public facilities</h3>
            </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="access_to_essentials" class="u-label">Do you have access to water and sanitation i.e. toilets and running
                  water Tick all areas that apply</label>

                <select id="access_to_essentials" name="access_to_essentials" class="u-grey-5 u-input u-input-rectangle">
                  <option value=""></option>
                  <option value="Yes">Yes</option>
                  <option selected value="No">No</option>
                </select>

              </div>



              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="earning_living" class="u-label">How do you earn a living?</label>

                <select id="earning_living" name="earning_living" class="u-grey-5 u-input u-input-rectangle" onchange="showHideOtherEarnALiving(this.value)">
                  <option  value=""></option>
                  <option value="self-employed">Self employed</option>
                  <option value="unemployed">Unemployed</option>
                  <option value="employed-part-time)">Employed (part time)</option>
                  <option selected value="employed-permanent)">Employed (permanent)</option>
                  <option value="informal-trader">Informal trader</option>
                </select>

              </div>


              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="employed-status-info" style="display: none;">
                <label for="select-9172" class="u-label">Has your employment changed?</label>
                <div class="u-form-select-wrapper">
                  <select id="changed_employment" name="changed_employment" class="u-grey-5 u-input u-input-rectangle" onchange="showHideEmploymentChanged(this.value)">
                
                    <option value="Yes">Yes</option>
                    <option  value="No">No</option>
                    <option value="Unsure?">Unsure</option>
                  </select>

                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                    <path fill="currentColor" d="M4 8L0 4h8z"></path>
                  </svg>
                </div>
              </div>
              <!--self employed-->
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="self-employed-info" style="display: none;">
                <label for="government_support" class="u-label">Did you access any government support schemes for small businesses/freelancers ?</label>
                <div class="u-form-select-wrapper">
                  <select id="government_support" name="government_support" class="u-grey-5 u-input u-input-rectangle">
                    <option selected value=""></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Unsure?">Unsure</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                    <path fill="currentColor" d="M4 8L0 4h8z"></path>
                  </svg>
                </div>
              </div>
              <!--unemployed-->
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="unemployed-info" style="display: none;">
                <label for="select-9179" class="u-label">Did you apply for any SASSA grants?</label>
                <div class="u-form-select-wrapper">
                  <select id="applied_sassa" name="applied_sassa" class="u-grey-5 u-input u-input-rectangle" onchange="showHideEmployementInfo(this.value)">
                    <option selected value=""></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Unsure">Unsure</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                    <path fill="currentColor" d="M4 8L0 4h8z"></path>
                  </svg>
                </div>
              </div>
              <!--  UNEMPLOYMENT ASSISTANCE-->

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="sassa-grant-info" style="display: none;">
                <label for="which_grant" class="u-label">Which grant did you apply</label>

                <select id="which_grant" name="which_grant" class="u-grey-5 u-input u-input-rectangle" onchange="showHideEmployAsstance(this.value)">
                  <option selected value=""></option>
                  <option value="old">Old persons Grant</option>
                  <option value="disability">Disability Grant</option>
                  <option value="care-dependency">Care-Dependency Grant</option>
                  <option value="war-veteran">War Veterans Grant</option>
                  <option value="child-support">Child Support Grant</option>
                  <option value="foster-child">Foster Child Grant</option>
                  <option value="in-aid">Grant-in-Aid</option>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                  <path fill="currentColor" d="M4 8L0 4h8z"></path>
                </svg>
              </div>




              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="employment-changed-info" style="display: none;">
                <label for="applied_assistance" class="u-label">If you lost your job during Covid, have you applied for unemployment assistance?</label>

                <select id="applied_assistance" name="applied_assistance" class="u-grey-5 u-input u-input-rectangle" onchange="showHideUnemploymentAssistance(this.value)">
                  <option selected value=""></option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                  <option value="Unsure?">Unsure</option>
                </select>


              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="applied_assistance-info" style="display: none;">
                <label for="application_success" class="u-label">Has your application been successful?</label>

                <select id="application_success" name="application_success" class="u-grey-5 u-input u-input-rectangle">
                  <option selected value=""></option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                  <option value="Unsure">Unsure</option>
                </select>

              </div>



              <div class="u-form-group u-form-select u-form-group-20">
                <h3>Module 4: Work Safety on COVID-19</h3>
              </div>


              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10"><br><br>
                <label for="select-e2ab" class="u-label">Has your employer taken any steps to make your working environment safe against COVID infection?</label>

                <select id="employer_safe_environment" name="employer_safe_environment" class="u-grey-5 u-input u-input-rectangle" onchange="showHideEmployerActions(this.value)">
                  <option value="Yes">Yes</option>
                  <option selected value="No">No</option>
                  <option value="Somewhat">Somewhat</option>
                </select>

              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="employer_Actions" style="display: none;">
                <label for="employer_measures" class="u-label">Which of the following measures has your employer taken?</label>
                <select id="employer_measures" name="employer_measures" class="u-grey-5 u-input u-input-rectangle">
                  <option value="COVID-19-manager-onsite">COVID-19 Manager onsite</option>
                  <option value="daily-temperature-checks">Daily temperature checks for all staff</option>
                  <option value="changed-policies?">Changed policies for sick leave?</option>
                </select>

              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="workplace_guidelines" class="u-label">Do you know the guidelines for the workplace during this pandemic?</label>

                <select id="workplace_guidelines" name="workplace_guidelines" class="u-grey-5 u-input u-input-rectangle">
                  <option value="Yes">Yes</option>
                  <option selected value="No">No</option>
                  <option value="Some">Some</option>
                </select>

              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="access_infomation" class="u-label"> Where are you accessing information on workplace regulations under Covid-19?</label>
                <select id="access_infomation" name="access_infomation" class="u-grey-5 u-input u-input-rectangle">
                  <option selected value="Yes">Work Office</option>
                  <option value="No">My Manager/ Boss</option>
                  <option value="Some">E-mail</option>
                  <option value="Yes">Social Media</option>
                  <option value="No">Billboards</option>
                  <option value="Some">Some</option>
                  <option value="Yes">Internet Search</option>
                  <option value="No">Printed Media</option>
                  <option value="Some">SMS</option>
                  <option value="Yes">Radio and TV</option>
                  <option value="No">Municipalities</option>
                  <option value="No">Neighbourhood Committee</option>
                  <option value="Some">Local NPOs</option>
                </select>
              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="travel_to_work" class="u-label">How do you travel to work?</label>

                <select id="travel_to_work" name="travel_to_work" class="u-grey-5 u-input u-input-rectangle" onchange="showHideTransportInfo(this.value)">
                  <option selected value="Own-car">Own car</option>
                  <option value="Car-pool">Car-pool with others</option>
                  <option value="Minibus Taxi">Minibus Taxi</option>
                  <option value="Bus">Bus</option>
                  <option value="Train">Train</option>
                  <option value="High-speed">High-speed rail (e.g. Gautrain)</option>
                  <option value="Uber-Taxify">Uber/Taxify</option>
                  <option value="Other">Other</option>
                </select>

              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="publicTransportInfo" style="display: none;">
                <label for="public_transport" class="u-label">If using public transport, are there safety measures that you can
                  see?</label>
                <select id="public_transport" name="public_transport" class="u-grey-5 u-input u-input-rectangle">
                  <option selected value="sanitised-at-entry">passengers sanitised at entry,</option>
                  <option value="wearing-masks">are passengers wearing masks</option>
                  <option value="driver-wearing-mask">Is the driver wearing a mask
                    throughout the trip?</option>
                  <option value="window-open">Is there a window open to allow for
                    air to flow?</option>
                  <option value="1-space">Is there at least 1 space between passengers?</option>
                </select>


              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="publicTransportInfo1" style="display: none;">
                <label for="public_transport_measures" class="u-label">If using public transport, what safety measures do you think are missing</label>
                <textarea placeholder="Please enter details" rows="4" cols="50" id="public_transport_measures" name="public_transport_measures" class="u-grey-5 u-input u-input-rectangle"></textarea>
              </div>

              <div class="row">
                <div class="col-sm-12" align="center">
                  <p>
                    <input type="submit" value="Register" name="submit" class="btn btn-primary">
                  </p>
                </div>
              </div>

          </form>
        </div>
      </div>
    </section>


    <footer class="u-align-center u-clearfix u-footer u-valign-bottom u-white u-footer" id="sec-96c0"><img class="u-expand-resize u-expanded-width u-image u-image-1" src="images/Footerredbandv1.png" data-image-width="2998" data-image-height="262"></footer>
  </body>
<?php } ?>

</html>