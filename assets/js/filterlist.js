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
    
   
    setFromYears();

   showStartupsInTable(data); //shows the whole data on load of page

   $(`#search-filter`).on(`keyup`, function(){ // looks for changes in search and filters the data accordingly
       var value = $(this).val();
       console.log(value);
       var Newdata = searchFilter(value, data);
       showStartupsInTable(Newdata);
   });

   $(`#expand`).on(`click`, function(){ // looks for changes in search and filters the data accordingly
    var filters = document.getElementById("filters");
    });

   function onlyOne(checkbox) { //handels the checkbox of team strength filter
        var checkboxes = document.getElementsByName('team')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }

    function setFromYears(){
        var fromYear = document.getElementById("fromYear");
        fromYear.innerHTML = '';
        var toYear = document.getElementById("toYear");
        toYear.innerHTML = '';
    
       for(var i = 2000; i <= 2021; i++){
           var row = `			      
                        <div @click="show=!show" class="cursor-pointer text-black border-gray-100 rounded-t border-b hover:bg-teal-100">
                            ${i}
                        </div>
                     `
           fromYear.innerHTML += row
           toYear.innerHTML += row
       }
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
       <figure class="md:w-3/4 lg:w-1/2 md:flex bg-gray-100 rounded-xl p-8 p-0 mx-auto">
       <img class="sm:w-30 sm:h-30 w-40 h-40 md:w-70 md:h-auto rounded-none rounded-full mx-auto" src="https://picsum.photos/200" alt="" width="384" height="512">
       <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
         <blockquote>
           <p class="text-lg font-semibold">
             “Tailwind CSS is the only framework that I've seen scale
             on large teams. It’s easy to customize, adapts to any design,
             and the build size is tiny.”
           </p>
         </blockquote>
         <figcaption class="font-medium">
           <div class="text-cyan-600">
             Sarah Dayan
           </div>
           <div class="text-gray-500">
             Staff Engineer, Algolia
           </div>
         </figcaption>
       </div>
     </figure>
                 `
       table.innerHTML += row
   }

}