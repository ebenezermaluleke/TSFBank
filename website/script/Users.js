//const url=`http://localhost/New%20Folder/website/connect.php`;

const url=`http://localhost/New%20Folder/webService/api/connect.php`;
const options={
    method:'GET',
    mode:'no-cors',
}

fetch(url, options).then(res=>res.json()).then(data=>{
    const users= data.data;
    console.log(users);
    let display="";
   

   users.forEach(user=>{
        display+=`
        <a href="Transfer.php?id=${user.C_Id}"> 
        <div class="transaction">
            <h1>Account no#: ${user.C_Id}</h1>
            <h1>Name: ${user.C_Name}</h1>
            <h1>Email: ${user.C_Email}</h1>
            <h1>Balance: R${user.C_Balance}</h1>
        </div>
        </a>`;
    });

    document.querySelector(".content").innerHTML= display;
}).catch(error=>console.error(error));