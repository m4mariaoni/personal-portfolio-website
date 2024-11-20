$(document).ready(function () {
     // Modal display function
     function showModal(title, content) {
        $("#modalTitle").text(title);
        $("#modalContent").html(content);
        $("#infoModal").modal('show');
    }

    // Button click handlers
    $("#demographicsBtn").on("click", function () {
        showDemographicsModal ("demographics", "Demographics");
     });
 
     $("#wikiBtn").on("click", function () {
         const countryName = $("#country-select option:selected").text();
         fetchWikipediaData(countryName, "Nearby Wikipedia Articles");
     });


     function showDemographicsModal(data, title) {
        if (data) {
            const content = `
                <div class="demographics">
                    <p><strong>Name:</strong>Maria</p>
                    <p><strong>Capital:</strong> me</p>
                    <p><strong>Population:</strong></p>
                    <p><strong>Languages:</strong> </p>
                    <p><strong>Currency Name:</strong></p>
                    <p><strong>Currency symbol:</strong> </p>
                    <p><strong>Flag:</strong><img src="../assets/img/portfolio/mixedmessage.png" alt="image"></p>
                    <p><strong>Flag Info:</strong> </p>
                </div>
            `;
            showModal(title, content);
        } else {
            showModal(title, "<p>No demographics data available.</p>");
        }
    }
 
});