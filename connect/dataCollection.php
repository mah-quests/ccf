<?php

include 'connect.php';

##########  Dashboard Data (generating graphs) #########
$sql = " SELECT * FROM summary_tbl WHERE DATE(completed_datetime) between '2020/10/01' and '2020/10/31' ";
$result = mysqli_query($db, $sql);
$numOfSurveysOct20 = mysqli_num_rows($result);

$sql = " SELECT * FROM summary_tbl WHERE DATE(completed_datetime) between '2020/11/01' and '2020/11/30' ";
$result = mysqli_query($db, $sql);
$numOfSurveysNov20 = mysqli_num_rows($result);


$sql = " SELECT * FROM summary_tbl WHERE DATE(completed_datetime) between '2020/12/01' and '2020/12/31' ";
$result = mysqli_query($db, $sql);
$numOfSurveysDec20 = mysqli_num_rows($result);


$sql = " SELECT * FROM summary_tbl WHERE DATE(completed_datetime) between '2021/01/01' and '2021/01/31' ";
$result = mysqli_query($db, $sql);
$numOfSurveysJan21 = mysqli_num_rows($result);


$sql = " SELECT * FROM summary_tbl WHERE DATE(completed_datetime) between '2021/02/01' and '2021/02/28' ";
$result = mysqli_query($db, $sql);
$numOfSurveysFeb21 = mysqli_num_rows($result);


$sql = " SELECT * FROM summary_tbl WHERE DATE(completed_datetime) between '2021/03/01' and '2021/03/31' ";
$result = mysqli_query($db, $sql);
$numOfSurveysMar21 = mysqli_num_rows($result);


$sql = " SELECT * FROM summary_tbl WHERE DATE(completed_datetime) between '2021/04/01' and '2021/04/30' ";
$result = mysqli_query($db, $sql);
$numOfSurveysApr21 = mysqli_num_rows($result);


$sql = " SELECT * FROM summary_tbl WHERE DATE(completed_datetime) between '2021/05/01' and '2021/05/31' ";
$result = mysqli_query($db, $sql);
$numOfSurveysMay21 = mysqli_num_rows($result);


$sql = " SELECT * FROM summary_tbl WHERE DATE(completed_datetime) between '2021/06/01' and '2021/06/30' ";
$result = mysqli_query($db, $sql);
$numOfSurveysJun21 = mysqli_num_rows($result);


$sql = " SELECT * FROM summary_tbl WHERE DATE(completed_datetime) between '2021/07/01' and '2021/07/31' ";
$result = mysqli_query($db, $sql);
$numOfSurveysJul21 = mysqli_num_rows($result);


$sql = " SELECT * FROM summary_tbl WHERE DATE(completed_datetime) between '2021/08/01' and '2021/08/31' ";
$result = mysqli_query($db, $sql);
$numOfSurveysAug21 = mysqli_num_rows($result);


$sql = " SELECT * FROM summary_tbl WHERE DATE(completed_datetime) between '2021/09/01' and '2021/09/30' ";
$result = mysqli_query($db, $sql);
$numOfSurveysSep21 = mysqli_num_rows($result);

$sql = " SELECT * FROM summary_tbl WHERE DATE(completed_datetime) between '2021/10/01' and '2021/10/31' ";
$result = mysqli_query($db, $sql);
$numOfSurveysOct21 = mysqli_num_rows($result);

##########  Dashboard Data (mobiliser info) #########

$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() - interval 1 day";
$result = mysqli_query($db, $sql);
$numOfCompletedSurveyYesterday = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() - interval 2 day";
$result = mysqli_query($db, $sql);
$numOfCompletedSurvey2DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() - interval 3 day";
$result = mysqli_query($db, $sql);
$numOfCompletedSurvey3DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() - interval 4 day";
$result = mysqli_query($db, $sql);
$numOfCompletedSurvey4DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() - interval 5 day";
$result = mysqli_query($db, $sql);
$numOfCompletedSurvey5DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() - interval 6 day";
$result = mysqli_query($db, $sql);
$numOfCompletedSurvey6DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() - interval 7 day";
$result = mysqli_query($db, $sql);
$numOfCompletedSurvey7DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() - interval 8 day";
$result = mysqli_query($db, $sql);
$numOfCompletedSurvey8DaysAgo = mysqli_num_rows($result);




##########  Dashboard Data (survey info) #########

$sql = "SELECT * FROM mobiliser_tbl WHERE date(created_date)=CURDATE() - interval 1 day";
$result = mysqli_query($db, $sql);
$numOfRegisteredMobilisersYesterday = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE date(created_date)=CURDATE() - interval 2 day";
$result = mysqli_query($db, $sql);
$numOfRegisteredMobilisers2DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE date(created_date)=CURDATE() - interval 3 day";
$result = mysqli_query($db, $sql);
$numOfRegisteredMobilisers3DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE date(created_date)=CURDATE() - interval 4 day";
$result = mysqli_query($db, $sql);
$numOfRegisteredMobilisers4DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE date(created_date)=CURDATE() - interval 5 day";
$result = mysqli_query($db, $sql);
$numOfRegisteredMobilisers5DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE date(created_date)=CURDATE() - interval 6 day";
$result = mysqli_query($db, $sql);
$numOfRegisteredMobilisers6DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE date(created_date)=CURDATE() - interval 7 day";
$result = mysqli_query($db, $sql);
$numOfRegisteredMobilisers7DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE date(created_date)=CURDATE() - interval 8 day";
$result = mysqli_query($db, $sql);
$numOfRegisteredMobilisers8DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE date(created_date)=CURDATE() - interval 9 day";
$result = mysqli_query($db, $sql);
$numOfRegisteredMobilisers9DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE date(created_date)=CURDATE() - interval 10 day";
$result = mysqli_query($db, $sql);
$numOfRegisteredMobilisers10DaysAgo = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE date(created_date)=CURDATE() - interval 11 day";
$result = mysqli_query($db, $sql);
$numOfRegisteredMobilisers11DaysAgo = mysqli_num_rows($result);

##########  Overall Mobiliser Stats #########

// Total number of mobilisers registered on the app
$sql = "SELECT * FROM mobiliser_tbl";
$result = mysqli_query($db, $sql);
$numOfRegisteredMobilisers = mysqli_num_rows($result);


##########  Provincial Mobiliser Data Stats #########
$sql = "SELECT * FROM mobiliser_tbl WHERE province = 'Gauteng' ";
$result = mysqli_query($db, $sql);
$gautengMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE province = 'Free State' ";
$result = mysqli_query($db, $sql);
$freeStateMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE province = 'North West' ";
$result = mysqli_query($db, $sql);
$northWestMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE province = 'Mpumalanga' ";
$result = mysqli_query($db, $sql);
$mpumalangaMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE province = 'Limpopo' ";
$result = mysqli_query($db, $sql);
$limpopoMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE province = 'Kwazulu Natal' ";
$result = mysqli_query($db, $sql);
$kznMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE province = 'Northern Cape' ";
$result = mysqli_query($db, $sql);
$northernCapeMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE province = 'Eastern Cape' ";
$result = mysqli_query($db, $sql);
$easternCapeMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl WHERE province = 'Western Cape' ";
$result = mysqli_query($db, $sql);
$westernCapeMobilisers = mysqli_num_rows($result);


##########  Overall Surveys Stats #########

// Total number of surveys completed across the provinces
$sql = "SELECT * FROM summary_tbl";
$result = mysqli_query($db, $sql);
$numOfCompletedSurveys = mysqli_num_rows($result);

##########  Provincial Survey Data Stats #########

$sql = "SELECT * FROM summary_tbl WHERE province = 'Gauteng' ";
$result = mysqli_query($db, $sql);
$gautengCompletedSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE province = 'Free State' ";
$result = mysqli_query($db, $sql);
$freeStateCompletedSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE province = 'North West' ";
$result = mysqli_query($db, $sql);
$northWestCompletedSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE province = 'Mpumalanga' ";
$result = mysqli_query($db, $sql);
$mpumalangaCompletedSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE province = 'Limpopo' ";
$result = mysqli_query($db, $sql);
$limpopoCompletedSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE province = 'Kwazulu Natal' ";
$result = mysqli_query($db, $sql);
$kznCompletedSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE province = 'Northern Cape' ";
$result = mysqli_query($db, $sql);
$northernCapeCompletedSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE province = 'Eastern Cape' ";
$result = mysqli_query($db, $sql);
$easternCapeCompletedSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE province = 'Western Cape' ";
$result = mysqli_query($db, $sql);
$westernCapeCompletedSurveys = mysqli_num_rows($result);


##########  Stats for today #########

// Total number of agents registered on the app
$sql = "SELECT * FROM mobiliser_tbl WHERE date(created_date)=CURDATE()";
$result = mysqli_query($db, $sql);
$numOfRegisteredMobilisersToday = mysqli_num_rows($result);


$sql = "SELECT DISTINCT mobiliser_id FROM summary_tbl where date(completed_datetime)=CURDATE()";
$result = mysqli_query($db, $sql);
$numOfActiveAgentsToday = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() AND province = 'Gauteng' ";
$result = mysqli_query($db, $sql);
$gautengCompletedSurveysToday = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() AND province = 'Free State' ";
$result = mysqli_query($db, $sql);
$freeStateCompletedSurveysToday = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() AND province = 'North West' ";
$result = mysqli_query($db, $sql);
$northWestCompletedSurveysToday = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() AND province = 'Mpumalanga' ";
$result = mysqli_query($db, $sql);
$mpumalangaCompletedSurveysToday = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() AND province = 'Limpopo' ";
$result = mysqli_query($db, $sql);
$limpopoCompletedSurveysToday = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() AND province = 'Kwazulu Natal' ";
$result = mysqli_query($db, $sql);
$kznCompletedSurveysToday = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() AND province = 'Northern Cape' ";
$result = mysqli_query($db, $sql);
$northernCapeCompletedSurveysToday = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() AND province = 'Eastern Cape' ";
$result = mysqli_query($db, $sql);
$easternCapeCompletedSurveysToday = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE() AND province = 'Western Cape' ";
$result = mysqli_query($db, $sql);
$westernCapeCompletedSurveysToday = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE date(completed_datetime)=CURDATE()";
$result = mysqli_query($db, $sql);
$numOfCompletedSurveysToday = mysqli_num_rows($result);

##########  Sector Mobiliser Details #########

$sql = "SELECT * FROM mobiliser_tbl where net_structure='Faith' ";
$result = mysqli_query($db, $sql);
$faithMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='People Living with HIV and AIDS (PLHIV)' ";
$result = mysqli_query($db, $sql);
$plhivMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='Non-Governmental Organisations' ";
$result = mysqli_query($db, $sql);
$npoMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='Sex Workers' ";
$result = mysqli_query($db, $sql);
$sexWorkerMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='Men' ";
$result = mysqli_query($db, $sql);
$menMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='LGBTIQ' ";
$result = mysqli_query($db, $sql);
$lgbtiMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='Youth' ";
$result = mysqli_query($db, $sql);
$youthMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='People with Disabilities' ";
$result = mysqli_query($db, $sql);
$peopleWithDisabilitiesMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='Sport, Arts & Culture' ";
$result = mysqli_query($db, $sql);
$sacMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='Traditional Health Practitioners' ";
$result = mysqli_query($db, $sql);
$traditionalhealthMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='Women' ";
$result = mysqli_query($db, $sql);
$womenMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='Children' ";
$result = mysqli_query($db, $sql);
$childrenMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='Health Professionals' ";
$result = mysqli_query($db, $sql);
$healthProfessionalsMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='Research' ";
$result = mysqli_query($db, $sql);
$researchMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='Traditional Leaders' ";
$result = mysqli_query($db, $sql);
$traditionalLeadersMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='Law & Human Rights' ";
$result = mysqli_query($db, $sql);
$humanRightsMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='Higer Education' ";
$result = mysqli_query($db, $sql);
$higerEducationMobilisers = mysqli_num_rows($result);


$sql = "SELECT * FROM mobiliser_tbl where net_structure='Labour' ";
$result = mysqli_query($db, $sql);
$labourMobilisers = mysqli_num_rows($result);


##########  Sector Survey Details #########

$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN  
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Faith') ";
$result = mysqli_query($db, $sql);
$faithSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'People Living with HIV and AIDS (PLHIV)') ";
$result = mysqli_query($db, $sql);
$plhivSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Non-Governmental Organisations') ";
$result = mysqli_query($db, $sql);
$npoSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Sex Workers') ";
$result = mysqli_query($db, $sql);
$sexWorkerSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Men') ";
$result = mysqli_query($db, $sql);
$menSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'LGBTIQ') ";
$result = mysqli_query($db, $sql);
$lgbtiSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Youth') ";
$result = mysqli_query($db, $sql);
$youthSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'People with Disabilities') ";
$result = mysqli_query($db, $sql);
$peopleWithDisabilitiesSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Sport, Arts & Culture') ";
$result = mysqli_query($db, $sql);
$sacSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Traditional Health Practitioners') ";
$result = mysqli_query($db, $sql);
$traditionalhealthSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Women') ";
$result = mysqli_query($db, $sql);
$womenSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Children') ";
$result = mysqli_query($db, $sql);
$childrenSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Health Professionals') ";
$result = mysqli_query($db, $sql);
$healthProfessionalsSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Research') ";
$result = mysqli_query($db, $sql);
$researchSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Traditional Leaders') ";
$result = mysqli_query($db, $sql);
$traditionalLeadersSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Law & Human Rights') ";
$result = mysqli_query($db, $sql);
$humanRightsSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Higer Education') ";
$result = mysqli_query($db, $sql);
$higerEducationSurveys = mysqli_num_rows($result);


$sql = "SELECT * FROM summary_tbl WHERE mobiliser_id IN 
(SELECT mobiliser_id FROM mobiliser_tbl where net_structure = 'Labour') ";
$result = mysqli_query($db, $sql);
$labourSurveys = mysqli_num_rows($result);


// Stats for yesterday
$sql = "SELECT count(DISTINCT mobiliser_id) FROM summary_tbl where date(created_date)=CURDATE() - interval 1 day";
$result = mysqli_query($db, $sql);
$numOfActiveAgentsYesterday = mysqli_num_rows($result);


##########  Data Analysis (reports page) #########
// Age brackets
$sql = "SELECT * FROM respondant_contact_tbl where age_bracket='18-24' ";
$result = mysqli_query($db, $sql);
$numOfAge18to24 = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where age_bracket='25-34' ";
$result = mysqli_query($db, $sql);
$numOfAge25to34 = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where age_bracket='35-44' ";
$result = mysqli_query($db, $sql);
$numOfAge35to44 = mysqli_num_rows($result);


$sql = "SELECT * FROM respondant_contact_tbl where age_bracket='45-54' ";
$result = mysqli_query($db, $sql);
$numOfAge45to54 = mysqli_num_rows($result);


$sql = "SELECT * FROM respondant_contact_tbl where age_bracket='55-65' ";
$result = mysqli_query($db, $sql);
$numOfAge55to64 = mysqli_num_rows($result);


$sql = "SELECT * FROM respondant_contact_tbl where age_bracket='65+' ";
$result = mysqli_query($db, $sql);
$numOfAge65plus = mysqli_num_rows($result);


// Race 
$sql = "SELECT * FROM respondant_contact_tbl where race='Black' ";
$result = mysqli_query($db, $sql);
$numOfRaceBlack = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where race='Asian' ";
$result = mysqli_query($db, $sql);
$numOfRaceAsian = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where race='Colored' ";
$result = mysqli_query($db, $sql);
$numOfRaceColored = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where race='Indian' ";
$result = mysqli_query($db, $sql);
$numOfRaceIndian = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where race='White' ";
$result = mysqli_query($db, $sql);
$numOfRaceWhite = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where race='Other' ";
$result = mysqli_query($db, $sql);
$numOfRaceOther = mysqli_num_rows($result);


// Religion 
$sql = "SELECT * FROM respondant_contact_tbl where religion='Christian' ";
$result = mysqli_query($db, $sql);
$numOfReligionChristian = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='Islam' ";
$result = mysqli_query($db, $sql);
$numOfReligionIslam = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='Hinduism' ";
$result = mysqli_query($db, $sql);
$numOfReligionHinduism = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='African-Religion' ";
$result = mysqli_query($db, $sql);
$numOfReligionAfrican = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='Judaism' ";
$result = mysqli_query($db, $sql);
$numOfReligionJudaism = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='Atheist' ";
$result = mysqli_query($db, $sql);
$numOfReligionAtheist = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='Rastafarian' ";
$result = mysqli_query($db, $sql);
$numOfReligionRastafarian = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='Prefer not to say' ";
$result = mysqli_query($db, $sql);
$numOfReligionUnknown = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='Other' ";
$result = mysqli_query($db, $sql);
$numOfReligionOther = mysqli_num_rows($result);

// Gender Identity
$sql = "SELECT * FROM respondant_contact_tbl where gender_id='Bisexual' ";
$result = mysqli_query($db, $sql);
$numOfGenderIDBisexual = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender_id='Heterosexual' ";
$result = mysqli_query($db, $sql);
$numOfGenderIDHeterosexual = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender_id='Homosexual' ";
$result = mysqli_query($db, $sql);
$numOfGenderIDHomosexual = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender_id='prefer-not' ";
$result = mysqli_query($db, $sql);
$numOfGenderIDUnknown = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender_id='Other' ";
$result = mysqli_query($db, $sql);
$numOfGenderIDOther = mysqli_num_rows($result);

//Gender
$sql = "SELECT * FROM respondant_contact_tbl where gender='Cisgender' ";
$result = mysqli_query($db, $sql);
$numOfGenderCisgender = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender='Gender Non-Conforming' ";
$result = mysqli_query($db, $sql);
$numOfGenderNonConform = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender='Transgender' ";
$result = mysqli_query($db, $sql);
$numOfGenderTransgender = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender='Queer/ Questioning' ";
$result = mysqli_query($db, $sql);
$numOfGenderQueer = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender='prefer-not' ";
$result = mysqli_query($db, $sql);
$numOfGenderUnknown = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender='Other' ";
$result = mysqli_query($db, $sql);
$numOfGenderOther = mysqli_num_rows($result);

// Sex Composition
$sql = "SELECT * FROM respondant_contact_tbl where sex='Male' ";
$result = mysqli_query($db, $sql);
$numOfSexMale = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where sex='Female' ";
$result = mysqli_query($db, $sql);
$numOfSexFemale = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where sex='Intersex' ";
$result = mysqli_query($db, $sql);
$numOfSexIntersex = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where sex='prefer-not' ";
$result = mysqli_query($db, $sql);
$numOfSexUnknown = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where sex='Other' ";
$result = mysqli_query($db, $sql);
$numOfSexOther = mysqli_num_rows($result);

//Pronous
$sql = "SELECT * FROM respondant_contact_tbl where pronouns='He' ";
$result = mysqli_query($db, $sql);
$numOfPronounsHe = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where pronouns='Him' ";
$result = mysqli_query($db, $sql);
$numOfPronounsHim = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where pronouns='They' ";
$result = mysqli_query($db, $sql);
$numOfPronounsThey = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where pronouns='Them' ";
$result = mysqli_query($db, $sql);
$numOfPronounsThem = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where pronouns='She' ";
$result = mysqli_query($db, $sql);
$numOfPronounsShe = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where pronouns='Her' ";
$result = mysqli_query($db, $sql);
$numOfPronounsHer = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where pronouns='Other' ";
$result = mysqli_query($db, $sql);
$numOfPronounsOther = mysqli_num_rows($result);

//Disability
$sql = "SELECT * FROM respondant_contact_tbl where disable='Yes' ";
$result = mysqli_query($db, $sql);
$numOfDisabled = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where disability_type='Physical disability' ";
$result = mysqli_query($db, $sql);
$numOfDisabledPhysical = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where disability_type='Vision Impairment' ";
$result = mysqli_query($db, $sql);
$numOfDisabledImpairment = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where disability_type='Deaf or hard of hearing' ";
$result = mysqli_query($db, $sql);
$numOfDisabledDeaf = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where disability_type='Intellectual disability' ";
$result = mysqli_query($db, $sql);
$numOfDisabledIntellectual = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where disability_type='Acquired brain injury' ";
$result = mysqli_query($db, $sql);
$numOfDisabledBrainInjury = mysqli_num_rows($result);

//Employment Status
$sql = "SELECT * FROM respondant_contact_tbl where employment_status='Employed, working 1-20 hours per week' ";
$result = mysqli_query($db, $sql);
$numOfEmployed1to20 = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where employment_status='Employed, working 21 – 40+ or more hours per week' ";
$result = mysqli_query($db, $sql);
$numOfEmployed21to40 = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where employment_status='Not employed, looking for work' ";
$result = mysqli_query($db, $sql);
$numOfUnEmployedLooking = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where employment_status='Not employed, NOT looking for work' ";
$result = mysqli_query($db, $sql);
$numOfUnEmployedNotLooking = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where employment_status='Retired / Pensioner' ";
$result = mysqli_query($db, $sql);
$numOfUnEmployedRetired = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where employment_status='Disabled, not able to work' ";
$result = mysqli_query($db, $sql);
$numOfUnEmployedDisabled = mysqli_num_rows($result);


##########  Data Analysis (respondants table) #########
// Age brackets
$sql = "SELECT * FROM respondant_contact_tbl where age_bracket='18-24' ";
$result = mysqli_query($db, $sql);
$numOfAge18to24 = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where age_bracket='25-34' ";
$result = mysqli_query($db, $sql);
$numOfAge25to34 = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where age_bracket='35-44' ";
$result = mysqli_query($db, $sql);
$numOfAge35to44 = mysqli_num_rows($result);


$sql = "SELECT * FROM respondant_contact_tbl where age_bracket='45-54' ";
$result = mysqli_query($db, $sql);
$numOfAge45to54 = mysqli_num_rows($result);


$sql = "SELECT * FROM respondant_contact_tbl where age_bracket='55-65' ";
$result = mysqli_query($db, $sql);
$numOfAge55to64 = mysqli_num_rows($result);


$sql = "SELECT * FROM respondant_contact_tbl where age_bracket='65+' ";
$result = mysqli_query($db, $sql);
$numOfAge65plus = mysqli_num_rows($result);


// Race 
$sql = "SELECT * FROM respondant_contact_tbl where race='Black' ";
$result = mysqli_query($db, $sql);
$numOfRaceBlack = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where race='Asian' ";
$result = mysqli_query($db, $sql);
$numOfRaceAsian = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where race='Colored' ";
$result = mysqli_query($db, $sql);
$numOfRaceColored = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where race='Indian' ";
$result = mysqli_query($db, $sql);
$numOfRaceIndian = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where race='White' ";
$result = mysqli_query($db, $sql);
$numOfRaceWhite = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where race='Other' ";
$result = mysqli_query($db, $sql);
$numOfRaceOther = mysqli_num_rows($result);


// Religion 
$sql = "SELECT * FROM respondant_contact_tbl where religion='Christian' ";
$result = mysqli_query($db, $sql);
$numOfReligionChristian = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='Islam' ";
$result = mysqli_query($db, $sql);
$numOfReligionIslam = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='Hinduism' ";
$result = mysqli_query($db, $sql);
$numOfReligionHinduism = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='African-Religion' ";
$result = mysqli_query($db, $sql);
$numOfReligionAfrican = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='Judaism' ";
$result = mysqli_query($db, $sql);
$numOfReligionJudaism = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='Atheist' ";
$result = mysqli_query($db, $sql);
$numOfReligionAtheist = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='Rastafarian' ";
$result = mysqli_query($db, $sql);
$numOfReligionRastafarian = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='Prefer not to say' ";
$result = mysqli_query($db, $sql);
$numOfReligionUnknown = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where religion='Other' ";
$result = mysqli_query($db, $sql);
$numOfReligionOther = mysqli_num_rows($result);

// Gender Identity
$sql = "SELECT * FROM respondant_contact_tbl where gender_id='Bisexual' ";
$result = mysqli_query($db, $sql);
$numOfGenderIDBisexual = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender_id='Heterosexual' ";
$result = mysqli_query($db, $sql);
$numOfGenderIDHeterosexual = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender_id='Homosexual' ";
$result = mysqli_query($db, $sql);
$numOfGenderIDHomosexual = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender_id='prefer-not' ";
$result = mysqli_query($db, $sql);
$numOfGenderIDUnknown = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender_id='Other' ";
$result = mysqli_query($db, $sql);
$numOfGenderIDOther = mysqli_num_rows($result);

//Gender
$sql = "SELECT * FROM respondant_contact_tbl where gender='Cisgender' ";
$result = mysqli_query($db, $sql);
$numOfGenderCisgender = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender='Gender Non-Conforming' ";
$result = mysqli_query($db, $sql);
$numOfGenderNonConform = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender='Transgender' ";
$result = mysqli_query($db, $sql);
$numOfGenderTransgender = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender='Queer/ Questioning' ";
$result = mysqli_query($db, $sql);
$numOfGenderQueer = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender='prefer-not' ";
$result = mysqli_query($db, $sql);
$numOfGenderUnknown = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where gender='Other' ";
$result = mysqli_query($db, $sql);
$numOfGenderOther = mysqli_num_rows($result);

// Sex Composition
$sql = "SELECT * FROM respondant_contact_tbl where sex='Male' ";
$result = mysqli_query($db, $sql);
$numOfSexMale = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where sex='Female' ";
$result = mysqli_query($db, $sql);
$numOfSexFemale = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where sex='Intersex' ";
$result = mysqli_query($db, $sql);
$numOfSexIntersex = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where sex='prefer-not' ";
$result = mysqli_query($db, $sql);
$numOfSexUnknown = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where sex='Other' ";
$result = mysqli_query($db, $sql);
$numOfSexOther = mysqli_num_rows($result);

//Pronous
$sql = "SELECT * FROM respondant_contact_tbl where pronouns='He' ";
$result = mysqli_query($db, $sql);
$numOfPronounsHe = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where pronouns='Him' ";
$result = mysqli_query($db, $sql);
$numOfPronounsHim = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where pronouns='They' ";
$result = mysqli_query($db, $sql);
$numOfPronounsThey = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where pronouns='Them' ";
$result = mysqli_query($db, $sql);
$numOfPronounsThem = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where pronouns='She' ";
$result = mysqli_query($db, $sql);
$numOfPronounsShe = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where pronouns='Her' ";
$result = mysqli_query($db, $sql);
$numOfPronounsHer = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where pronouns='Other' ";
$result = mysqli_query($db, $sql);
$numOfPronounsOther = mysqli_num_rows($result);

//Disability
$sql = "SELECT * FROM respondant_contact_tbl where disable='Yes' ";
$result = mysqli_query($db, $sql);
$numOfDisabled = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where disability_type='Physical disability' ";
$result = mysqli_query($db, $sql);
$numOfDisabledPhysical = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where disability_type='Vision Impairment' ";
$result = mysqli_query($db, $sql);
$numOfDisabledImpairment = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where disability_type='Deaf or hard of hearing' ";
$result = mysqli_query($db, $sql);
$numOfDisabledDeaf = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where disability_type='Intellectual disability' ";
$result = mysqli_query($db, $sql);
$numOfDisabledIntellectual = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where disability_type='Acquired brain injury' ";
$result = mysqli_query($db, $sql);
$numOfDisabledBrainInjury = mysqli_num_rows($result);

//Employment Status
$sql = "SELECT * FROM respondant_contact_tbl where employment_status='Employed, working 1-20 hours per week' ";
$result = mysqli_query($db, $sql);
$numOfEmployed1to20 = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where employment_status='Employed, working 21 – 40+ or more hours per week' ";
$result = mysqli_query($db, $sql);
$numOfEmployed21to40 = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where employment_status='Not employed, looking for work' ";
$result = mysqli_query($db, $sql);
$numOfUnEmployedLooking = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where employment_status='Not employed, NOT looking for work' ";
$result = mysqli_query($db, $sql);
$numOfUnEmployedNotLooking = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where employment_status='Retired / Pensioner' ";
$result = mysqli_query($db, $sql);
$numOfUnEmployedRetired = mysqli_num_rows($result);

$sql = "SELECT * FROM respondant_contact_tbl where employment_status='Disabled, not able to work' ";
$result = mysqli_query($db, $sql);
$numOfUnEmployedDisabled = mysqli_num_rows($result);


##########  Data Analysis (module 1 : surviving covid) #########
// Tested Positive
$sql = "SELECT * FROM surviving_covid_tbl where tested_covid='Yes' ";
$result = mysqli_query($db, $sql);
$numOfYesTestedPositive = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where tested_covid='No' ";
$result = mysqli_query($db, $sql);
$numOfNoTestedPositive = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where tested_covid='Unsure' ";
$result = mysqli_query($db, $sql);
$numOfUnsureTestedPositive = mysqli_num_rows($result);

$totalNumberOfTests = $numOfYesTestedPositive + $numOfNoTestedPositive + $numOfUnsureTestedPositive;

// Hospitalized
$sql = "SELECT * FROM surviving_covid_tbl where hospitalised='Yes' ";
$result = mysqli_query($db, $sql);
$numOfYesHospitalised = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where hospitalised='No' ";
$result = mysqli_query($db, $sql);
$numOfNoHospitalised = mysqli_num_rows($result);


// Isolation
$sql = "SELECT * FROM surviving_covid_tbl where isolate_info='Isolated in my own household' ";
$result = mysqli_query($db, $sql);
$numOfIsolatedHousehold = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where isolate_info='Isolated in a separate dwelling outside of my usual house' ";
$result = mysqli_query($db, $sql);
$numOfIsolatedOutside = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where isolate_info='I did not self-isolate' ";
$result = mysqli_query($db, $sql);
$numOfDidNotIsolate = mysqli_num_rows($result);


// Access to support services
$sql = "SELECT * FROM surviving_covid_tbl where counselling_support='Yes' ";
$result = mysqli_query($db, $sql);
$numOfAccessToCounselling = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where physical_rehab='Yes' ";
$result = mysqli_query($db, $sql);
$numOfPhysicalRehab = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where disability_grant='Yes' ";
$result = mysqli_query($db, $sql);
$numOfDisabilityGrant = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where access_medication='Yes' ";
$result = mysqli_query($db, $sql);
$numOfAccessMedication = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where information='Yes' ";
$result = mysqli_query($db, $sql);
$numOfInformation = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where no_access='Yes' ";
$result = mysqli_query($db, $sql);
$numOfNoAccess = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where other='Yes' ";
$result = mysqli_query($db, $sql);
$numOfOtherAccess = mysqli_num_rows($result);


// Need to support services
$sql = "SELECT * FROM surviving_covid_tbl where need_counselling_support='Yes' ";
$result = mysqli_query($db, $sql);
$numOfNeedAccessToCounselling = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where need_physical_rehab='Yes' ";
$result = mysqli_query($db, $sql);
$numOfNeedPhysicalRehab = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where need_disability_grant='Yes' ";
$result = mysqli_query($db, $sql);
$numOfNeedDisabilityGrant = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where need_access_medication='Yes' ";
$result = mysqli_query($db, $sql);
$numOfNeedAccessMedication = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where need_information='Yes' ";
$result = mysqli_query($db, $sql);
$numOfNeedInformation = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where need_no_access='Yes' ";
$result = mysqli_query($db, $sql);
$numOfNeedNoAccess = mysqli_num_rows($result);


$sql = "SELECT * FROM surviving_covid_tbl where need_other='Yes' ";
$result = mysqli_query($db, $sql);
$numOfNeedOtherAccess = mysqli_num_rows($result);

##########  Data Analysis (module 2 : lifestyle changes) #########
// Lifestyle Changes
$sql = "SELECT * FROM social_behaviour_tbl where family='Yes' ";
$result = mysqli_query($db, $sql);
$numOfFamilyLifeStyleChange = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where worship='Yes' ";
$result = mysqli_query($db, $sql);
$numOfWorshipLifeStyleChange = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where friends='Yes' ";
$result = mysqli_query($db, $sql);
$numOfFriendsLifeStyleChange = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where work='Yes' ";
$result = mysqli_query($db, $sql);
$numOfWorkLifeStyleChange = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where shopping='Yes' ";
$result = mysqli_query($db, $sql);
$numOfShoppingLifeStyleChange = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where travel='Yes' ";
$result = mysqli_query($db, $sql);
$numOfTravelLifeStyleChange = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where other='Yes' ";
$result = mysqli_query($db, $sql);
$numOfOtherLifeStyleChange = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where family_social_distancing='Yes' ";
$result = mysqli_query($db, $sql);
$numOfYesPracticeSocialDistancing = mysqli_num_rows($result);

$sql = "SELECT * FROM social_behaviour_tbl where family_social_distancing='No' ";
$result = mysqli_query($db, $sql);
$numOfNoPracticeSocialDistancing = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where family_social_distancing='Most times' ";
$result = mysqli_query($db, $sql);
$numOfMostTimesPracticeSocialDistancing = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where family_social_distancing='Sometimes' ";
$result = mysqli_query($db, $sql);
$numOfSometimesPracticeSocialDistancing = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where see_friends='Much less' ";
$result = mysqli_query($db, $sql);
$numOfMuchLessSeeFriends = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where see_friends='Less' ";
$result = mysqli_query($db, $sql);
$numOfLessSeeFriends = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where see_friends='The same' ";
$result = mysqli_query($db, $sql);
$numOfTheSameSeeFriends = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where see_friends='More' ";
$result = mysqli_query($db, $sql);
$numOfMoreSeeFriends = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where see_friends='Much more' ";
$result = mysqli_query($db, $sql);
$numOfMuchMoreSeeFriends = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where health_improvements='Better' ";
$result = mysqli_query($db, $sql);
$numOfBetterHealthImprovements = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where health_improvements='The same' ";
$result = mysqli_query($db, $sql);
$numOfTheSameHealthImprovements = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where health_improvements='Worse' ";
$result = mysqli_query($db, $sql);
$numOfWorseHealthImprovements = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where health_improvements='Not sure' ";
$result = mysqli_query($db, $sql);
$numOfNotSureHealthImprovements = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where healthy_food='Much less' ";
$result = mysqli_query($db, $sql);
$numOfMuchLessDailyMeals = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where healthy_food='Less' ";
$result = mysqli_query($db, $sql);
$numOfLessDailyMeals = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where healthy_food='The same' ";
$result = mysqli_query($db, $sql);
$numOfTheSameDailyMeals = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where healthy_food='More' ";
$result = mysqli_query($db, $sql);
$numOfMoreDailyMeals = mysqli_num_rows($result);


$sql = "SELECT * FROM social_behaviour_tbl where healthy_food='Much more' ";
$result = mysqli_query($db, $sql);
$numOfMuchMoreDailyMeals = mysqli_num_rows($result);


##########  Data Analysis (module 3 : access to public falicity) #########

$sql = "SELECT * FROM public_facilities_tbl where community_access_points='Yes' ";
$result = mysqli_query($db, $sql);
$numOfCommunityAccessPoints = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where flushing_toilet_inside_dwelling='Yes' ";
$result = mysqli_query($db, $sql);
$numOfToiletInsideDwelling = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where flushing_toilet_outside_dwelling='Yes' ";
$result = mysqli_query($db, $sql);
$numOfToiletOutsideDwelling = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where tap_inside_dwelling='Yes' ";
$result = mysqli_query($db, $sql);
$numOfTapInsideDwelling = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where tap_outside_dwelling='Yes' ";
$result = mysqli_query($db, $sql);
$numOfTapOutsideDwelling = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where earning_living='Self employed' ";
$result = mysqli_query($db, $sql);
$numOfSelfEmployed = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where earning_living='Unemployed' ";
$result = mysqli_query($db, $sql);
$numOfUnemployed = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where earning_living='Employed (part time)' ";
$result = mysqli_query($db, $sql);
$numOfEmployedPartTime = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where earning_living='Employed (permanent)' ";
$result = mysqli_query($db, $sql);
$numOfEmployedPermanent = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where earning_living='Informal trader' ";
$result = mysqli_query($db, $sql);
$numOfInformalTrader = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where changed_employment='Yes' ";
$result = mysqli_query($db, $sql);
$numOfYesChangedEmployment = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where changed_employment='No' ";
$result = mysqli_query($db, $sql);
$numOfNoChangedEmployment = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where changed_employment='Unsure?' ";
$result = mysqli_query($db, $sql);
$numOfUnsureChangedEmployment = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where government_support='Yes' ";
$result = mysqli_query($db, $sql);
$numOfYesGovernmentSupport = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where government_support='No' ";
$result = mysqli_query($db, $sql);
$numOfNoGovernmentSupport = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where government_support='Unsure?' ";
$result = mysqli_query($db, $sql);
$numOfUnsureGovernmentSupport = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where applied_sassa='Yes' ";
$result = mysqli_query($db, $sql);
$numOfYesAppliedSassa = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where applied_sassa='No' ";
$result = mysqli_query($db, $sql);
$numOfNoAppliedSassa = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where which_grant='old' ";
$result = mysqli_query($db, $sql);
$numOfOldPersonsGrant = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where which_grant='disability' ";
$result = mysqli_query($db, $sql);
$numOfDisabilityGrant = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where which_grant='care-dependency' ";
$result = mysqli_query($db, $sql);
$numOfCareDependencyGrant = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where which_grant='war-veteran' ";
$result = mysqli_query($db, $sql);
$numOfWarVeteranGrant = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where which_grant='child-support' ";
$result = mysqli_query($db, $sql);
$numOfChildSupportGrant = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where which_grant='foster-child' ";
$result = mysqli_query($db, $sql);
$numOfFosterChildGrant = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where which_grant='in-aid' ";
$result = mysqli_query($db, $sql);
$numOfInAidGrant = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where applied_assistance='Yes' ";
$result = mysqli_query($db, $sql);
$numOfYesAppliedAssistance = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where applied_assistance='No' ";
$result = mysqli_query($db, $sql);
$numOfNoAppliedAssistance = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where applied_assistance='Unsure?' ";
$result = mysqli_query($db, $sql);
$numOfUnsureAppliedAssistance = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where application_success='Yes' ";
$result = mysqli_query($db, $sql);
$numOfYesApplicationSuccess = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where application_success='No' ";
$result = mysqli_query($db, $sql);
$numOfNoApplicationSuccess = mysqli_num_rows($result);


$sql = "SELECT * FROM public_facilities_tbl where application_success='Unsure?' ";
$result = mysqli_query($db, $sql);
$numOfUnsureApplicationSuccess = mysqli_num_rows($result);


##########  Data Analysis (module 4 : work safety on Covid-19) #########

$sql = "SELECT * FROM work_safety_tbl where employer_safe_environment='Yes' ";
$result = mysqli_query($db, $sql);
$numOfYesSafeWorkplace = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where employer_safe_environment='No' ";
$result = mysqli_query($db, $sql);
$numOfNoSafeWorkplace = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where employer_safe_environment='Somewhat' ";
$result = mysqli_query($db, $sql);
$numOfSomewhatSafeWorkplace = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where employer_measures='COVID-19-manager-onsite' ";
$result = mysqli_query($db, $sql);
$numOfCOVIDManager = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where employer_measures='daily-temperature-checks' ";
$result = mysqli_query($db, $sql);
$numOfDailyTemperatureChecks = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where employer_measures='changed-policies?' ";
$result = mysqli_query($db, $sql);
$numOfChangedPolicies = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where workplace_guidelines='Yes' ";
$result = mysqli_query($db, $sql);
$numOfKnownWorkplaceGuidelines = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where workplace_guidelines='No' ";
$result = mysqli_query($db, $sql);
$numOfUnKnownWorkplaceGuidelines = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where workplace_guidelines='Some' ";
$result = mysqli_query($db, $sql);
$numOfSomeKnownWorkplaceGuidelines = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where access_infomation='Work Office' ";
$result = mysqli_query($db, $sql);
$numOfWorkOfficeAccessInfomation = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where access_infomation='My Manager' ";
$result = mysqli_query($db, $sql);
$numOfMyManagerAccessInfomation = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where access_infomation='E-mail' ";
$result = mysqli_query($db, $sql);
$numOfEMailAccessInfomation = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where access_infomation='Social Media' ";
$result = mysqli_query($db, $sql);
$numOfSocialMediaAccessInfomation = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where access_infomation='Billboards' ";
$result = mysqli_query($db, $sql);
$numOfBillboardsAccessInfomation = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where access_infomation='Some' ";
$result = mysqli_query($db, $sql);
$numOfSomeAccessInfomation = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where access_infomation='Internet Search' ";
$result = mysqli_query($db, $sql);
$numOfInternetSearchAccessInfomation = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where access_infomation='Printed Media' ";
$result = mysqli_query($db, $sql);
$numOfPrintedMediaAccessInfomation = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where access_infomation='SMS' ";
$result = mysqli_query($db, $sql);
$numOfSMSAccessInfomation = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where access_infomation='Radio and TV' ";
$result = mysqli_query($db, $sql);
$numOfRadioTVAccessInfomation = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where access_infomation='Municipalities' ";
$result = mysqli_query($db, $sql);
$numOfMunicipalitiesAccessInfomation = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where access_infomation='Neighbourhood Committee' ";
$result = mysqli_query($db, $sql);
$numOfNeighbourhoodCommitteeAccessInfomation = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where access_infomation='Local NPOs' ";
$result = mysqli_query($db, $sql);
$numOfLocalNPOCommitteeAccessInfomation = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where travel_to_work='Own-car' ";
$result = mysqli_query($db, $sql);
$numOfOwnCarWorkTravel = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where travel_to_work='Car-pool' ";
$result = mysqli_query($db, $sql);
$numOfCarPoolWorkTravel = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where travel_to_work='Minibus Taxi' ";
$result = mysqli_query($db, $sql);
$numOfMinibusTaxiWorkTravel = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where travel_to_work='Bus' ";
$result = mysqli_query($db, $sql);
$numOfBusTaxiWorkTravel = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where travel_to_work='Train' ";
$result = mysqli_query($db, $sql);
$numOfTrainWorkTravel = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where travel_to_work='High-speed' ";
$result = mysqli_query($db, $sql);
$numOfHighSpeedWorkTravel = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where travel_to_work='Uber-Taxify' ";
$result = mysqli_query($db, $sql);
$numOfUberTaxifyWorkTravel = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where travel_to_work='Other' ";
$result = mysqli_query($db, $sql);
$numOfOtherWorkTravel = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where public_transport='sanitised-at-entry' ";
$result = mysqli_query($db, $sql);
$numOfSanitisedAtEntry = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where public_transport='wearing-masks' ";
$result = mysqli_query($db, $sql);
$numOfWearingMasks = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where public_transport='driver-wearing-mask' ";
$result = mysqli_query($db, $sql);
$numOfDriverWearingMask = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where public_transport='window-open' ";
$result = mysqli_query($db, $sql);
$numOfWindowOpen = mysqli_num_rows($result);


$sql = "SELECT * FROM work_safety_tbl where public_transport='1-space' ";
$result = mysqli_query($db, $sql);
$numOf1Space = mysqli_num_rows($result);

?>