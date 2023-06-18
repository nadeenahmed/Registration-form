function change() { 

    var mylist = document.getElementById("myList");
    var lang = mylist.options[mylist.selectedIndex].text;
    if (lang == "English" || lang == "الانجليزية") {
        window.location.href = "/";
    } else if (lang == "Arabic" || lang == "العربية") {
        window.location.href = "/ar";
    }
}
