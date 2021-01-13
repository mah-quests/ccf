<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
<?php
include("connect/connectDB.php"); // connection to db
error_reporting(0);
session_start();
?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Community Constituency, COVID-19, Survey, Agents, South Africa, NEDLAC, SANAC, CCF, Community Constituency Front">
    <meta name="description" content="Community Constituency, COVID-19, Survey, Agents, South Africa, NEDLAC, SANAC, CCF, Community Constituency Front">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title> CCF - Community Constituency Front  </title>
    <link rel="stylesheet" href="assets/nicepage.css" media="screen">
    <link rel="icon" href="images/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script class="u-script" type="text/javascript" src="assets/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="assets/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.1.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "",
      "url": "index.php"
      }
    </script>
    <meta property="og:title" content="CCF Web App">
    <meta property="og:type" content="Web App">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.php">
    <meta property="og:url" content="index.php">


    <script type="text/javascript">
      // module 1
      function showHideOtherTestedForCovid() {
        var noOption = document.getElementById("tested_covid").value;
        if (noOption == "Yes") {
          jQuery('#hospitalized-covid-info').show();
          document.getElementById("hospitalized-covid-info").style.visibility = 'visible';
          jQuery('#isolateInfo').show();
          document.getElementById("isolateInfo").style.visibility = 'visible';

        } else {
          jQuery('#hospitalized-covid-info').hide();
          document.getElementById("hospitalized-covid-info").style.visibility = 'hidden';
          jQuery('#isolateInfo').hide();
          document.getElementById("isolateInfo").style.visibility = 'hidden';
          jQuery('#support_services').show();
          document.getElementById("support_services").style.visibility = 'visible';
          jQuery('#need_support_services').show();
          document.getElementById("need_support_services").style.visibility = 'visible';
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
          jQuery('#hospitalized-covid-info').show();
          document.getElementById("hospitalized-covid-info").style.visibility = 'visible';
          jQuery('#hospitalized-covid-inf').show();
          document.getElementById("hospitalized-covid-inf").style.visibility = 'visible';
        }
      }


      function showHideYouHospitalized() {
        var noOption = document.getElementById("hospitalised").value;
        if (noOption == "Yes") {
          jQuery('#isolateInfo').show();
          document.getElementById("isolateInfo").style.visibility = 'visible';
        } else {
          jQuery('#isolateInfo').show();
          document.getElementById("isolateInfo").style.visibility = 'visible';
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

      function showHideSupportServices() {
        var noOption = document.getElementById("isolate_info").value;
        if (noOption == "Yes") {
          jQuery('#support_services').show();
          document.getElementById("support_services").style.visibility = 'visible';
          jQuery('#need_support_services').show();
          document.getElementById("need_support_services").style.visibility = 'visible';
        } else {
          jQuery('#support_services').show();
          document.getElementById("support_services").style.visibility = 'visible';
          jQuery('#need_support_services').show();
          document.getElementById("need_support_services").style.visibility = 'visible';
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

      function showHideOtherLifeStyleChanges() {
        var noOption = document.getElementById("other").value;
        if (noOption == "Yes") {
          jQuery('#other_lifestyle_changes').show();
          document.getElementById("other_lifestyle_changes").style.visibility = 'visible';
        } else {
          jQuery('#other_lifestyle_changes').hide();
          document.getElementById("other_lifestyle_changes").style.visibility = 'hidden';
        }
      }

      function showHideSocialDistance() {
        var noOption = document.getElementById("social_distancing").value;
        if (noOption == "Yes") {
          jQuery('#family_social_distancing_info').show();
          document.getElementById("family_social_distancing_info").style.visibility = 'visible';
        } else {
          jQuery('#family_social_distancing_info').show();
          document.getElementById("family_social_distancing_info").style.visibility = 'visible';
        }
      }

      function showHideSeeingFriends() {
        var noOption = document.getElementById("family_social_distancing").value;
        if (noOption == "Yes") {
          jQuery('#seeing_friends_info').show();
          document.getElementById("seeing_friends_info").style.visibility = 'visible';
        } else {
          jQuery('#seeing_friends_info').show();
          document.getElementById("seeing_friends_info").style.visibility = 'visible';
        }
      }


      function showHideExerciseLevels() {
        var noOption = document.getElementById("see_friends").value;
        if (noOption == "Yes") {
          jQuery('#exercise_info').show();
          document.getElementById("exercise_info").style.visibility = 'visible';
        } else {
          jQuery('#exercise_info').show();
          document.getElementById("exercise_info").style.visibility = 'visible';
        }
      }


      function showHideHealthyFoods() {
        var noOption = document.getElementById("exercise").value;
        if (noOption == "Yes") {
          jQuery('#healthy_food_info').show();
          document.getElementById("healthy_food_info").style.visibility = 'visible';
        } else {
          jQuery('#healthy_food_info').show();
          document.getElementById("healthy_food_info").style.visibility = 'visible';
        }
      }


      function showHideStepsToImproveHealth() {
        var noOption = document.getElementById("see_friends").value;
        if (noOption == "Yes") {
          jQuery('#compared_health').show();
          document.getElementById("compared_health").style.visibility = 'visible';
        } else {
          jQuery('#compared_health').show();
          document.getElementById("compared_health").style.visibility = 'visible';
        }
      }


      function showHideDailyMeals() {
        var noOption = document.getElementById("health_improvements").value;
        if (noOption == "Yes") {
          jQuery('#daily_meals_info').show();
          document.getElementById("daily_meals_info").style.visibility = 'visible';
        } else {
          jQuery('#daily_meals_info').show();
          document.getElementById("daily_meals_info").style.visibility = 'visible';
        }
      }

      function showHideImproveHelthArea() {
        var noOption = document.getElementById("health_improvements").value;
        if (noOption == "Yes") {
          jQuery('#steps_improve_details_info').show();
          document.getElementById("steps_improve_details_info").style.visibility = 'visible';
        } else {
          jQuery('#steps_improve_details_info').hide();
          document.getElementById("steps_improve_details_info").style.visibility = 'hidden';
        }
      }


// Module 3

      function showHideAccessToEssentials() {
        var noOption = document.getElementById("access_to_essentials").value;
        if (noOption == "Yes") {
          jQuery('#earn_a_living_info').show();
          document.getElementById("earn_a_living_info").style.visibility = 'visible';
        } else {
          jQuery('#earn_a_living_info').hide();
          document.getElementById("earn_a_living_info").style.visibility = 'hidden';
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




      function showHideTransportInfo() {
        var noOption = document.getElementById("travel_to_work").value;
        if (noOption != "Own-car") {
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

      function showHideOtherEarnALiving() {
        var noOption = document.getElementById("earning_living").value;

        if (noOption == "Employed (part time)") {
          jQuery('#employment_changed_info').show();
          document.getElementById("employment_changed_info").style.visibility = 'visible';
        }

        if (noOption == "Employed (permanent)") {
          jQuery('#employment_changed_info').show();
          document.getElementById("employment_changed_info").style.visibility = 'visible';
        }

        if (noOption == "Self employed") {
          jQuery('#government_scheme_info').show();
          document.getElementById("government_scheme_info").style.visibility = 'visible';
        }

        if (noOption == "Informal trader") {
          jQuery('#government_scheme_info').show();
          document.getElementById("government_scheme_info").style.visibility = 'visible';
        }

        if (noOption == "Unemployed") {
          jQuery('#unemployed-info').show();
          document.getElementById("unemployed-info").style.visibility = 'visible';
        }

      }



// Module 4


      function showHideCurrentlyEmployed() {
        var noOption = document.getElementById("currently_employed").value;
        if (noOption == "Yes") {
          jQuery('#employed_work_conditions').show();
          document.getElementById("employed_work_conditions").style.visibility = 'visible';
        } else {
          jQuery('#travel_to_work_and_around').show();
          document.getElementById("travel_to_work_and_around").style.visibility = 'visible';
          jQuery('#employed_work_conditions').hide();
          document.getElementById("employed_work_conditions").style.visibility = 'hidden';          
        }
      }


      function showHideEmployerActions() {
        var noOption = document.getElementById("employer_safe_environment").value;
        if (noOption == "Yes") {
          jQuery('#employer_actions').show();
          document.getElementById("employer_actions").style.visibility = 'visible';
        } else {
          jQuery('#employer_actions').hide();
          document.getElementById("employer_actions").style.visibility = 'hidden';
          jQuery('#travel_to_work_and_around').show();
          document.getElementById("travel_to_work_and_around").style.visibility = 'visible';          
        }
      }

      function showHideGuidelines() {
        var noOption = document.getElementById("workplace_guidelines").value;
        if (noOption == "Yes") {
          jQuery('#access_workplace_regulations').show();
          document.getElementById("access_workplace_regulations").style.visibility = 'visible';
          jQuery('#travel_to_work_and_around').show();
          document.getElementById("travel_to_work_and_around").style.visibility = 'visible';          
        } else {
          jQuery('#access_workplace_regulations').hide();
          document.getElementById("access_workplace_regulations").style.visibility = 'hidden';
          jQuery('#travel_to_work_and_around').show();
          document.getElementById("travel_to_work_and_around").style.visibility = 'visible';          
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



// Module 5

      function showHideModule05Question01() {
          jQuery('#hygiene-number-01-info').show();
          document.getElementById("hygiene-number-01-info").style.visibility = 'visible';
      }

      function showHideModule05Question02() {
          jQuery('#hygiene-number-02-info').show();
          document.getElementById("hygiene-number-02-info").style.visibility = 'visible';
      }  

      function showHideModule05Question03() {
          jQuery('#hygiene-number-03-info').show();
          document.getElementById("hygiene-number-03-info").style.visibility = 'visible';
      }  

      function showHideModule05Question04() {
          jQuery('#hygiene-number-04-info').show();
          document.getElementById("hygiene-number-04-info").style.visibility = 'visible';
      }  

      function showHideModule05Question05() {
          jQuery('#hygiene-number-05-info').show();
          document.getElementById("hygiene-number-05-info").style.visibility = 'visible';
      } 

      function showHideModule05Question06() {
          jQuery('#hygiene-number-06-info').show();
          document.getElementById("hygiene-number-06-info").style.visibility = 'visible';
      }                              

// Module 6

      function showHideModule06Question01() {
          jQuery('#vaccine-number-01-info').show();
          document.getElementById("vaccine-number-01-info").style.visibility = 'visible';
      }

      function showHideModule06Question02() {
          jQuery('#vaccine-number-02-info').show();
          document.getElementById("vaccine-number-02-info").style.visibility = 'visible';
      }  

      function showHideModule06Question03() {
          jQuery('#vaccine-number-03-info').show();
          document.getElementById("vaccine-number-03-info").style.visibility = 'visible';
      }  

      function showHideModule06Question04() {
          jQuery('#vaccine-number-04-info').show();
          document.getElementById("vaccine-number-04-info").style.visibility = 'visible';
      }  

      function showHideModule06Question05() {
          jQuery('#vaccine-number-05-info').show();
          document.getElementById("vaccine-number-05-info").style.visibility = 'visible';
      } 

      function showHideModule06Question06() {
          jQuery('#vaccine-number-06-info').show();
          document.getElementById("vaccine-number-06-info").style.visibility = 'visible';
      }                              



    function showHideVaccineToBeOffered() {
      
      var noOption = document.getElementById("vaccine_offering").value;

      if (noOption == "Yes") {
        jQuery('#commodity-you-have-info').show();
        document.getElementById("commodity-you-have-info").style.visibility = 'visible';
        jQuery('#commodity-you-donot-have-info').hide();
        document.getElementById("commodity-you-donot-have-info").style.visibility = 'hidden';        
      } else {
        jQuery('#commodity-you-have-info').hide();
        document.getElementById("commodity-you-have-info").style.visibility = 'hidden';
        jQuery('#commodity-you-donot-have-info').show();
        document.getElementById("commodity-you-donot-have-info").style.visibility = 'visible';        
      }
    }

    function goBack() {
      window.history.back();
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


  <?php

    if ($stmt = $db->prepare('SELECT first_name, surname FROM mobiliser_tbl WHERE cellnumber = ?')) {

      // Bind parameters (s = string, i = int, b = blob, etc)
      $stmt->bind_param('s', $_SESSION['name']);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows > 0) {
        $stmt->bind_result($first_name, $surname);
        $stmt->fetch();
      }
    }

  ?>


  <body data-home-page="index.php" data-home-page-title="index" class="u-body">
    <header class="u-align-left u-clearfix u-header u-valign-top-md u-valign-top-sm u-header" id="sec-0e3f">
      <img class="u-expand-resize u-expanded-width u-image u-image-1" src="images/CCFheader.png" data-image-width="2945" data-image-height="536">

      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
        <p class="u-text u-text-palette-1-dark-2 u-text-1">Welcome, <?php echo $first_name.' '.$surname ?> is currently logged
        </p>
      <?php } ?>

          <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
            <div class="menu-collapse">
              <a class="u-button-style u-nav-link" href="#" style="padding: 4px 0px; font-size: calc(1em + 8px);">
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
          <ul class="u-nav u-unstyled">
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link" href="index.php">Home</a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link" href="about.php">About Community Constituency</a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link" href="survey.php">Survey</a>
            </li>


<?php 
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

            <li class="u-nav-item">
              <a class="u-button-style u-nav-link">Agents</a>
              <div class="u-nav-popup">
                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">
                  <li class="u-nav-item">
                    <a class="u-button-style u-nav-link u-white" href="profile.php">Profile</a>
                  </li>
                  <li class="u-nav-item">
                    <a class="u-button-style u-nav-link u-white" href="logout.php">Logout</a>
                  </li>
                  <li class="u-nav-item">
                    <a class="u-button-style u-nav-link u-white" href="register.php">Register</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link" href="report.php">Progress</a>
            </li>

<?php 
  } else {
?>

            <li class="u-nav-item">
              <a class="u-button-style u-nav-link">Agents</a>
              <div class="u-nav-popup">
                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">
                  <li class="u-nav-item">
                    <a class="u-button-style u-nav-link u-white" href="login.php">Login</a>
                  </li>
                  <li class="u-nav-item">
                    <a class="u-button-style u-nav-link u-white" href="register.php">Register</a>
                  </li>
                </ul>
              </div>
            </li>

<?php 
  } 
?>

            <li class="u-nav-item">
              <a class="u-button-style u-nav-link" href="contact.php">Contact Us</a>
            </li>
          </ul>
        </div>
        <div class="u-custom-menu u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                <li class="u-nav-item">
                  <a class="u-button-style u-nav-link" href="index.php">Home</a></li>
                <li class="u-nav-item">
                  <a class="u-button-style u-nav-link" href="about.php">About CCF</a></li>
                <li class="u-nav-item">
                  <a class="u-button-style u-nav-link" href="survey.php">Survey</a>
                </li>
<?php 
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>                
                <li class="u-nav-item">
                  <a class="u-button-style u-nav-link">Agents</a>
                  <div class="u-nav-popup">
                    <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-4">
                      <li class="u-nav-item">
                        <a class="u-button-style u-nav-link" href="profile.php">Profile</a>
                      </li>
                      <li class="u-nav-item">
                        <a class="u-button-style u-nav-link" href="logout.php">Logout</a>
                      </li>
                      <li class="u-nav-item">
                        <a class="u-button-style u-nav-link" href="register.php">Register</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="u-nav-item">
                  <a class="u-button-style u-nav-link" href="report.php">Progress</a>
                </li>
<?php 
  } else {
?>
                <li class="u-nav-item">
                  <a class="u-button-style u-nav-link">Agents</a>
                  <div class="u-nav-popup">
                    <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-4">
                      <li class="u-nav-item">
                        <a class="u-button-style u-nav-link" href="login.php">Login</a>
                      </li>
                      <li class="u-nav-item">
                        <a class="u-button-style u-nav-link" href="register.php">Register</a>
                      </li>
                    </ul>
                  </div>
                </li>
<?php 
  } 
?>
                <li class="u-nav-item">
                  <a class="u-button-style u-nav-link" href="contact.php">Contact Us</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      </nav>
    </header>