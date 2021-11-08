window.onload = function(){

    let form = document.getElementById("lookup");
    let search = document.getElementById("lookfor");

    form.addEventListener('click', function(e){
        e.preventDefault();
        let test = document.getElementById('country').value;
        let context = 'country';
           var trim = test.trim();
           var param = {country:`${trim}`};
           console.log(param);
           fetch("http://localhost/info2180-lab5/world.php?context="+context+"&country="+ trim)
           .then(response =>{
               if (response.ok){
                   return response.text();
                }else{
                }
           })
           .then(data =>{
               document.getElementById('result').innerHTML = data;
            });
    })

    search.addEventListener('click', function(e){
        e.preventDefault();
        let context = 'cities';
        let check = document.getElementById('country').value;
           var checker = check.trim();
           var param = {country:`${checker}`,context: 'cities'};
           console.log(param);
           fetch("http://localhost/info2180-lab5/world.php?context="+context+"&country="+ checker)
           .then(response =>{
               if (response.ok){
                   return response.text();
                }else{
                }
           })
           .then(data =>{
               console.log(data);
               document.getElementById('result').innerHTML = data;
            });
    });
}

