<style type="text/css">
  body
  {
    font-family: 'Poppins', sans-serif;
        
    background-color: #707793;
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
    background-color: #707793;
    border-radius: 10px;
    font-size: 20px;
    width: 100%;
    position: center;
    overflow: auto;
  }
  .formcls th
  {
    padding: 10px;
    color: #3bba9c;
    font-size: 20px;
    width: 100%;
  }
  .formcls td
  {
    padding: 10px;
    color: #f5f5f5;
    font-size: 20px;
    width: 100%;
  }
  .formcls input
  {
    padding: 10px;
    border: none;
    border-bottom: 3px solid #f5f5f5;
    background-color: transparent;
    color: #f5f5f5;
    border-radius: 5px;
    width: 90%;
  }
  .formcls label
  {
    border: none;
    font-size: 20px;
    color: #3bba9c;
   }
  .formcls input:focus
  {
    outline: none;
    border: none;
    border-bottom: 3px solid #3bba9c;
    background-color: transparent;
    color: #3bba9c;
    transform: scale(1.05);
  
  }
  .formcls input:disabled
  {
    outline: none;
    border: 1px solid #d5d5d5;
    background-color: #d5d5d5;
    color: grey;
  
  }
  .formcls button
  {
       border: 1px solid #3bba9c;
       background-color: #3bba9c;
       color: white;
       padding-left:10px;
       padding-top:5px;
       padding-bottom:5px;
       padding-right:10px;
       border-radius: 5px;

  }
  .navbutton
  {
       border: 1px solid #3bba9c;
       background-color: transparent;
       color: #3bba9c;
       padding-left:10px;
       padding-top:5px;
       padding-bottom:5px;
       padding-right:10px;
       border-radius: 5px;

  }

  .navbutton:hover
  {
       border: 1px solid #3bba9c;
       background-color: #3bba9c;
       color: black;

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
       color: black;

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
  background: #3bba9c;

  border: 1px solid #3bba9c;
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
  background: #3bba9c;

  border: 1px solid #3bba9c;
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
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #707793;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #707793;
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
  color: black;
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

</style>        
