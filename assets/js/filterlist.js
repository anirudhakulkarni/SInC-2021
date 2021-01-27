var data = [
    {"startUp" : "#IN12345", "name" : "ABC Company", "date" : "10/01/2020", "domain" : "E-commerce", "stage" : "Completed"},
    {"startUp" : "#IN12346", "name" : "XYZ Company", "date" : "12/11/2019", "domain" : "Education", "stage" : "Processing"},
    {"startUp" : "#IN12347", "name" : "Education Company", "date" : "02/3/2019", "domain" : "Education", "stage" : "Completed"},
    {"startUp" : "#IN12348", "name" : "QWERTY Company", "date" : "24/03/2020", "domain" : "Technology", "stage" : "Pending"},
    {"startUp" : "#IN12349", "name" : "Education Company", "date" : "02/3/2019", "domain" : "Education", "stage" : "Completed"},
   
   ];

    var inputLeft = document.getElementById("input-left");
    var inputRight = document.getElementById("input-right");

    var thumbLeft = document.querySelector(".slider > .thumb.left");
    var thumbRight = document.querySelector(".slider > .thumb.right");
    var range = document.querySelector(".slider > .range");

   showStartupsInTable(data); //shows the whole data on load of page

   $(`#search-filter`).on(`keyup`, function(){ // looks for changes in search and filters the data accordingly
       var value = $(this).val();
       console.log(value);
       var Newdata = searchFilter(value, data);
       showStartupsInTable(Newdata);
   });

   function onlyOne(checkbox) { //handels the checkbox of team strength filter
        var checkboxes = document.getElementsByName('team')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }

    
    function setLeftValue() {
        var _this = inputLeft,
            min = parseInt(_this.min),
            max = parseInt(_this.max);

        _this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value) - 1);

        var percent = ((_this.value - min) / (max - min)) * 100;
        document.getElementById('min-input').value = _this.value.toString();
        thumbLeft.style.left = percent + "%";
        range.style.left = percent + "%";
    }
    setLeftValue();

    function setRightValue() {
        var _this = inputRight,
            min = parseInt(_this.min),
            max = parseInt(_this.max);

        _this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value) + 1);

        var percent = ((_this.value - min) / (max - min)) * 100;
        document.getElementById('max-input').value = _this.value.toString();
        thumbRight.style.right = (100 - percent) + "%";
        range.style.right = (100 - percent) + "%";
    }
    setRightValue();

    inputLeft.addEventListener("input", setLeftValue);
    inputRight.addEventListener("input", setRightValue);

    inputLeft.addEventListener("mouseover", function() {
        thumbLeft.classList.add("hover");
    });
    inputLeft.addEventListener("mouseout", function() {
        thumbLeft.classList.remove("hover");
    });
    inputLeft.addEventListener("mousedown", function() {
        thumbLeft.classList.add("active");
    });
    inputLeft.addEventListener("mouseup", function() {
        thumbLeft.classList.remove("active");
    });

    inputRight.addEventListener("mouseover", function() {
        thumbRight.classList.add("hover");
    });
    inputRight.addEventListener("mouseout", function() {
        thumbRight.classList.remove("hover");
    });
    inputRight.addEventListener("mousedown", function() {
        thumbRight.classList.add("active");
    });
    inputRight.addEventListener("mouseup", function() {
        thumbRight.classList.remove("active");
    });

   function searchFilter(value, data){ // function to filter data bases on input in the search field
       var filteredData = [];
       value = value.toLowerCase();
       for(var i = 0; i< data.length; i++){

           var startUp = data[i].startUp.toLowerCase();
           var name = data[i].name.toLowerCase();
           var date = data[i].date.toLowerCase();
           var domain = data[i].domain.toLowerCase();
           var stage = data[i].stage.toLowerCase();

           if(startUp.includes(value) || name.includes(value) || date.includes(value) || domain.includes(value) || stage.includes(value)){
             filteredData.push(data[i]);
           }
       }
       
       return filteredData;
   }

   function viewAll(){ //fired when user clicks on view all, clears the search field and resets the list
    document.getElementById('search-filter').value ='';
    showStartupsInTable(data);
   }

   function showStartupsInTable(data){ //main function that adds tags/cards to main area based on the array(data) passed to it
   var table = document.getElementById("startups");
   table.innerHTML = ''

   for(var i = 0; i < data.length; i++){
       var spanClass = "px-2 rounded-full text-sm uppercase tracking-wide font-semibold bg-green-200 text-green-800";
       if(`${data[i].stage.toLowerCase()}` == "pending"){
        spanClass = "px-2 rounded-full text-sm uppercase tracking-wide font-semibold bg-orange-200 text-orange-800";
       }

       if(`${data[i].stage.toLowerCase()}` == "processing"){
        spanClass = "px-2 rounded-full text-sm uppercase tracking-wide font-semibold bg-blue-200 text-blue-800";
       }

       var row = `			      
                <div class="card col-6 mb-2 mx-auto" >
                <div class="row no-gutters">
                    <div class="col-4">
                    <img src="https://unsplash.it/300/300?image=503" class="card-img" alt="">
                    </div>
                    <div class="col-8">
                    <div class="card-body">
                        <div class="flex justify-content-between"> 
                        <h5>StartUp Name</h5>
                        <p class="card-text"> <span class="${spanClass}">${data[i].stage}</span></p>
                        

                      
                        </div>

                        <p>
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        </p>
                        
                       
                        <div class="collapse" id="${data[i].startUp}">
                        
                        <p>
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh
                        helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        </p>
                        
                        </div>
                        <button
                            class="py-1 px-6 bg-red-600 text-white focus:outline-none"
                            data-toggle="collapse" data-target="#${data[i].startUp}"
                        >
                            View More
                        </button>
                        
                    
                    </div>
                    </div>
                </div>
                </div>
                 `
       table.innerHTML += row
   }

}