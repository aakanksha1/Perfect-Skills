  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <style type="text/css">
  body
  {
    font-family: 'Poppins', sans-serif;
        color:black;
    background-color: #ffffff;
  }
  .containerbg
  {
    background-repeat: no-repeat;
        background-size: 100% 100%;
        height: 100vh;
  }
  .maincontainer
  {
    padding-top: 50px;
    padding-bottom: 50px;

  }
  .formcls
  {
    padding: 30px;
    background-color: #b8dce9;
    border-radius: 10px;
    font-size: 20px;
    width: 100%;
    position: center;
    overflow: auto;
  }
  .formcls th
  {
    padding: 10px;
    color: #26657b;
    font-size: 20px;
    width: 100%;
  }
  .formcls td
  {
    padding: 10px;
    color: black;
    font-size: 20px;
    width: 100%;
  }
  .formcls input
  {
    padding: 10px;
    border: none;
    border-bottom: 3px solid black;
    background-color: transparent;
    color: black;
    border-radius: 5px;
    width: 90%;
  }
  .formcls label
  {
    border: none;
    font-size: 20px;
    color: #26657b;
   }
  .formcls input:focus
  {
    outline: none;
    border: none;
    border-bottom: 3px solid #26657b;
    background-color: transparent;
    color: #26657b;
    transform: scale(1.05);
  
  }
  .formcls input:disabled
  {
    outline: none;
    border: 1px solid #ffffff;
    background-color: #ffffff;
    color: grey;
  
  }
  .formcls button 
  {
       border: 1px solid #26657b;
       background-color: #26657b;
       color: white;
       padding-left:10px;
       padding-top:5px;
       padding-bottom:5px;
       padding-right:10px;
       border-radius: 5px;

  }
  .tablediv
  {
    padding: 20px;
    color: black;
  }

.alt label
{
  color: black;
  font-size:20px;
  font-weight: bolder;
}
.alt b
{
 font-size:20px; 
}

  .tablediv button 
  {
       border: 1px solid #26657b;
       background-color: #26657b;
       color: white;
       padding-left:10px;
       padding-top:5px;
       padding-bottom:5px;
       padding-right:10px;
       border-radius: 5px;
              cursor: pointer;


  }
  .navbutton
  {
       border: 1px solid #26657b;
       background-color: transparent;
       color: #26657b;
       padding-left:10px;
       padding-top:5px;
       padding-bottom:5px;
       padding-right:10px;
       border-radius: 5px;
       cursor: pointer;

  }

  .navbutton:hover
  {
       border: 1px solid #26657b;
       background-color: #26657b;
       color: white;

  }

  .navbutton:focus
  {
   outline: none;
  }
 .rtbutton
  {
       border: 1px solid #e57069;
       background-color: transparent;
       color: #e57069;
       padding-left:10px;
       padding-top:5px;
       padding-bottom:5px;
       padding-right:10px;
       border-radius: 5px;

  }

  .rtbutton:hover
  {
       border: 1px solid #e57069;
       background-color: #e57069;
       color: white;

  }
  
  .tclass
  {
    padding-left: 20px;
    padding-right: 20px;
    height: 800px;
    overflow-y: scroll;
  }

  .tclass::-webkit-scrollbar,.formcls::-webkit-scrollbar {
  width: 10px;
}

/* Track */
.tclass::-webkit-scrollbar-track,.formcls::-webkit-scrollbar-track {
  background: transparent;

  border: 1px solid transparent;
  border-radius: 10px; 
}
 
/* Handle */
.tclass::-webkit-scrollbar-thumb,.formcls::-webkit-scrollbar-thumb {
  background: #26657b;

  border: 1px solid #26657b;
  border-radius: 10px; 
  display: none;
}

.tclass::-webkit-scrollbar-thumb:hover, .formcls::-webkit-scrollbar-thumb:hover {
  display: block;
}

  ::-webkit-scrollbar{
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track{
  background: #daf3ed;

  border: 1px solid #daf3ed;
}
 
/* Handle */
::-webkit-scrollbar-thumb{
  background: #26657b;

  border: 1px solid #26657b;
}
  .pad
  {
   padding-bottom: 30px; 
  }

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 2; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: auto; /* Full height */
  overflow:auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* white w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #b8dce9;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #b8dce9;
  color: #fff;
  width: auto; /* Could be more or less, depending on screen size */
  position: relative;
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: white;
  text-decoration: none;
  cursor: pointer;
}
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;
}
.qdiv
{
  padding: 30px;
    background-color: #b8dce9;
    border-radius: 10px;
    font-size: 20px;
    width: 100%;
    position: center;
    overflow: auto;
}
.qdiv input[type='radio']:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #d1d3d1;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

.qdiv input[type='radio']:checked:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #26657b;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid #26657b;
    }

.qdiv input[type='radio']:checked + label {
        
        color: #26657b;
    }

.qdiv input[type='radio']:hover + label {
        
      cursor: pointer;
    }

.qdiv a
{
  text-decoration: none;
  background-color: #b8dce9;
  padding-left:10px;
  padding-right: 10px;
  border:1px solid #26657b;
  border-radius:5px;
  color: #26657b;
}
.qdiv a:hover
{
  background-color: #26657b;
  border:1px solid #26657b;
  border-radius:5px;
  color: #b8dce9;
}

.qdiv a:visited
{
  background-color: #26657b;
  border:1px solid #26657b;
  border-radius:5px;
  color: #b8dce9;
}
.qdiv input[type='submit']
{
 background-color: #b8dce9;
  padding-left:10px;
  padding-right: 10px;
  border:1px solid #26657b;
  border-radius:5px;
  color: #26657b; 
  font-size: 20px;
}
.qdiv input[type='submit']:hover
{
  background-color: #26657b;
  border:1px solid #26657b;
  border-radius:5px;
  color: #b8dce9; 
}
.qdiv button
{
  background-color: transparent;
  color: #26657b;
  border: 2px solid #26657b;
  border-radius: 45%;
  font-size: 25px;
  font-weight: bolder;
}
.qdiv button:focus
{
 outline: none;
}
.qdiv button:hover
{
  background-color: #26657b;
  color: #b8dce9;
  border: 2px solid #26657b;
}

.chartcontainer
{
    width: 100%;
    height: 400px;
}

</style>        
