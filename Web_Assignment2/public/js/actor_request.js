const getActorsButton = document.getElementById("get-actors-button");
getActorsButton.addEventListener("click", function () {
    const birthdateInput = document.getElementById("birthDate");
    const date = birthdateInput.value;
    // extract the month and day from the date
    const month = date.substring(5, 7);
    const day = date.substring(8, 10);

    fetch(`/actors/born-on-date?month=${month}&day=${day}`)
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            const actors = data.actors;

            const actorContainer = document.getElementById("container");

            for (let i = 0; i < actors.length; i++) {
                // create a div for each actor
                const actorDetailsDiv = document.createElement("div");
                const actorName = document.createElement("p");
                actorName.textContent =
                    validationMessages["Name of actor"] +
                    (i + 1) +
                    ": " +
                    actors[i].name;
                const actorBirthdate = document.createElement("p");
                actorBirthdate.textContent =
                    validationMessages["Birth date of actor"] +
                    (i + 1) +
                    ": " +
                    actors[i].birthDate;
                const actorBirthplace = document.createElement("p");
                actorBirthplace.textContent =
                    validationMessages["Birth place of actor"] +
                    (i + 1) +
                    ": " +
                    actors[i].birthPlace;
                actorDetailsDiv.appendChild(actorName);
                actorDetailsDiv.appendChild(actorBirthdate);
                actorDetailsDiv.appendChild(actorBirthplace);
                actorContainer.appendChild(actorDetailsDiv);
            }

            // append the actor container to the page
            const container = document.getElementById("container");
            container.appendChild(actorContainer);
        })
        .catch((error) => console.error(error));
});
