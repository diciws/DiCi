<?php
/*
 * German version by Brain23413 
*/

/************* Normale General Translation *************/

$lang["general"]["langcode"] = "de_DE";
$lang["general"]["error"] = "Fehler, bitte benachrichtige einen Web-Adminstrator!";
$lang["general"]["loginerror"] = "Falscher Nutzername oder Passwort! Bitte versuche es in einigen Minuten erneut!";

/************* Registration-Site *************/

$lang["register"]["title"] = "Bitte Registriere dich hier!";
$lang["register"]["r2"] = "Bist du bereits Registriert?";
$lang["register"]["login"] = "Anmeldung";
$lang["register"]["succesregister"] = "Du bist jetzt Registriert. Bitte bestätige die Email, die wir dir gesendet haben.";
$lang["register"]["username"] = "Nutzername";
$lang["register"]["emailadress"] = "Email-Adresse";
$lang["register"]["password"] = "Passwort";
$lang["register"]["confirmpassword"] = "Passwort bestätigen";
$lang["register"]["submitregister"] = "Registrieren";

//email verify filter errors
$lang["registeremail"]["titlerp"] = "Registrierung";
$lang["registeremail"]["body1"] = "<p>Danke für deine Interresse in unser Netzwerk!</p><p>Wenn das ein Fehler war, bitte ignorieren Sie diese Email!</p>";
$lang["registeremail"]["registerlink"] = "Um dein Account zu registrieren drücke den folgenden Link";
$lang["registeremail"]["greetings"] = "Mit freundlichen Grüßen";

//errors from the register site
$lang["register"]["nametooshort"] = "Der Nutzername ist zu kurz!";
$lang["register"]["isalredyused"] = "Der Nutzername wird bereits genutzt!";
$lang["register"]["pwtoshort"] = "Das Passwort ist zu kurz!";
$lang["register"]["confpwisshort"] = "Das Bestätigungs Passwort ist zu kurz!";
$lang["register"]["pwnmatch"] = "Das Passwort stimmt nicht mit dem Bestätigungs-Passwort überein!";
$lang["register"]["emailaused"] = "Die Email wird bereits genutzt!";
$lang["register"]["emailisnright"] = "Bitte gib eine gültige Email ein!";

/************* Login-Site *************/

$lang["login"]["title"] = "Bitte hier Anmelden!";
$lang["login"]["r2"] = "Zurück zur Homepage";
$lang["login"]["succesverify"] = "Dein Account wurde verifiziert, Bitte melde dich jetzt an.";
$lang["login"]["emailverify"] = "Bitte verifiziere deine Email-Adresse mit dem Link in deinem Postfach!";
$lang["login"]["passwordchange"] = "Dein Nutzername wurde Erfolgreich geändert, du kannst dich jetzt anmelden!";
$lang["login"]["username"] = "Nutzername";
$lang["login"]["password"] = "Passwort";
$lang["login"]["forgotpassword"] = "Passwort vergessen?";
$lang["login"]["loginnow"] = "Anmeldung";

/************* ResetPassword-Site *************/

$lang["resetpw"]["title"] = "Passwort zurücksetzen";
$lang["resetpw"]["r2"] = "Zurück zur Anmeldung";
$lang["resetpw"]["succeslogin"] = "Dein Account wurde verifiziert, du kannst dich jetzt anmelden!";
$lang["resetpw"]["resetpwemailfolder"] = "Bitte überprüfe dein Email-Postfach, um dein Passwort zu ändern!";
$lang["resetpw"]["username"] = "Nutzername";
$lang["resetpw"]["email"] = "Email-Adresse";
$lang["resetpw"]["sendlink"] = "Mein Passwort zurücksetzen ";

//email verify filter errors
$lang["resetpw"]["emailfail"] = "Bitte gebe eine gültige Email-Adresse an!";
$lang["resetpw"]["emailisneeded"] = "Du musst eine Email-Adresse angeben!";
$lang["resetpwemail"]["titlerp"] = "Passwort zurücksetzten";
$lang["resetpwemail"]["body1"] = "<p>Jemand möchte dein Passwort zurücksetzen.</p><p>Wenn das ein Fehler ist, ignoriere bitte diese Email!</p>";
$lang["resetpwemail"]["resetlink"] = "Um dein Passwort zu ändern, drücke folgenden Link ";

/************* ResetverifiedPassword-Site *************/

$lang["resetverifiedpw"]["title"] = "Passwort zurücksetzen";
$lang["resetverifiedpw"]["password"] = "Passwort";
$lang["resetverifiedpw"]["confirmpassword"] = "Passwort bestätigen";
$lang["resetverifiedpw"]["changepassword"] = "Passwort ändern";

//errors by verification reset password
$lang["resetverifiedpw"]["falsetoken"] = "Du hast den falschen Token benutzt, bitte benutze den Token in deinem Email Postfach!";
$lang["resetverifiedpw"]["justeditedpassword"] = "Dein Passwort wurde geändert!";
$lang["resetverifiedpw"]["passwordtooshort"] = "Das Passwort ist zu kurz!";
$lang["resetverifiedpw"]["confirmpasswordtooshort"] = "Das Bestätigungs Passwort ist zu kurz!";
$lang["resetverifiedpw"]["passwordnmatch"] = "Die Passwörter stimmen nicht überein!";

/************* Activation-Site *************/

$lang["activate"]["errorverify"] = "Deine Email konnte nicht verifiziert werden!";

/************* Control-Site *************/

    /************* Admin-Site *************/

    $lang["admininterface"]["welcome"] = "Willkommen bei DiCi, ";
    $lang["admininterface"]["text1"] = "<p>Das ist ein cooles Projekt von mir! Viel Spaß!</p>";
    $lang["admininterface"]["admininterface"] = "Admin - Interface";

        
        //navigation
        $lang["adminnavigation"]["home"] = "Startseite";
        $lang["adminnavigation"]["profile"] = "Profil";
        $lang["adminnavigation"]["stats"] = "Statistiken/Abzeichen";
        $lang["adminnavigation"]["apply"] = "Bewerbungen";
        $lang["adminnavigation"]["logout"] = "logout";
    
        //admin profile
        $lang["adminprofile"]["profile"] = "Dein Profil";
        $lang["adminprofile"]["permissions"] = "Deine Rechte: ";
        $lang["adminprofile"]["getid"] = "Deine ID: ";
        $lang["adminprofile"]["ipadress"] = "IP-Adresse: ";

    /************* Mod-Site *************/

    $lang["admininterface"]["welcome"] = "Willkommen bei DiCi, ";
    $lang["admininterface"]["text1"] = "<p>Das ist ein cooles Projekt von mir! Viel Spaß!</p>";
    $lang["modinterface"]["modinterface"] = "Mod - Interface";
        
        //navigation
        $lang["modinterface"]["home"] = "Startseite";
        $lang["modinterface"]["profile"] = "Profil";
        $lang["modinterface"]["stats"] = "Statistiken/Abzeichen";
        $lang["modinterface"]["apply"] = "Bewerbungen";
        $lang["modinterface"]["logout"] = "logout";
    
        //mod profile
        $lang["modinterface"]["profile"] = "Dein Profil";
        $lang["modinterface"]["permissions"] = "Deine Rechte: ";
        $lang["modinterface"]["getid"] = "Deine ID: ";
        $lang["modinterface"]["ipadress"] = "IP-Adresse: ";

    /************* User-Site *************/

    $lang["admininterface"]["welcome"] = "Willkommen bei DiCi, ";
    $lang["admininterface"]["text1"] = "<p>Das ist ein cooles Projekt von mir! Viel Spaß!</p>";
    $lang["userinterface"]["userinterface"] = "User - Interface";
        
        //navigation
        $lang["userinterface"]["home"] = "Startseite";
        $lang["userinterface"]["profile"] = "Profil";
        $lang["userinterface"]["stats"] = "Statistiken/Abzeichen";
        $lang["userinterface"]["apply"] = "Bewerbungen";
        $lang["userinterface"]["logout"] = "logout";
    
        //mod profile
        $lang["userinterface"]["profile"] = "Dein Profil";
        $lang["userinterface"]["permissions"] = "Deine Rechte: ";
        $lang["userinterface"]["getid"] = "Deine ID: ";
        $lang["userinterface"]["ipadress"] = "IP-Adresse: ";

