<style>
  body
  {
    font-family: 'Poppins', sans-serif;
        color:white;
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
    background-color: #e3f2fd;
    border-radius: 10px;
    font-size: 20px;
    width: 100%;
    position: center;
    overflow: auto;
  }
  .formcls th
  {
    padding: 10px;
    color: #0275d8;
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
    color: #0275d8;
   }
  .formcls input:focus
  {
    outline: none;
    border: none;
    border-bottom: 3px solid #0275d8;
    background-color: transparent;
    color: #0275d8;
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
       border: 1px solid #0275d8;
       background-color: #0275d8;
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
       border: 1px solid #0275d8;
       background-color: #0275d8;
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
       border: 1px solid #0275d8;
       background-color: transparent;
       color: #0275d8;
       padding-left:10px;
       padding-top:5px;
       padding-bottom:5px;
       padding-right:10px;
       border-radius: 5px;
       cursor: pointer;

  }

  .navbutton:hover
  {
       border: 1px solid #0275d8;
       background-color: #0275d8;
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
  background: #0275d8;

  border: 1px solid #0275d8;
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
  background: #0275d8;

  border: 1px solid #0275d8;
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
  background-color: #e3f2fd;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #e3f2fd;
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
    background-color: #e3f2fd;
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
        background-color: #0275d8;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid #0275d8;
    }

.qdiv input[type='radio']:checked + label {
        
        color: #0275d8;
    }

.qdiv input[type='radio']:hover + label {
        
      cursor: pointer;
    }

.qdiv a
{
  text-decoration: none;
  background-color: #e3f2fd;
  padding-left:10px;
  padding-right: 10px;
  border:1px solid #0275d8;
  border-radius:5px;
  color: #0275d8;
}
.qdiv a:hover
{
  background-color: #0275d8;
  border:1px solid #0275d8;
  border-radius:5px;
  color: #e3f2fd;
}

.qdiv a:visited
{
  background-color: #0275d8;
  border:1px solid #0275d8;
  border-radius:5px;
  color: #e3f2fd;
}
.qdiv input[type='submit']
{
 background-color: #e3f2fd;
  padding-left:10px;
  padding-right: 10px;
  border:1px solid #0275d8;
  border-radius:5px;
  color: #0275d8; 
  font-size: 20px;
}
.qdiv input[type='submit']:hover
{
  background-color: #0275d8;
  border:1px solid #0275d8;
  border-radius:5px;
  color: #e3f2fd; 
}
.qdiv button
{
  background-color: transparent;
  color: #0275d8;
  border: 2px solid #0275d8;
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
  background-color: #0275d8;
  color: #e3f2fd;
  border: 2px solid #0275d8;
}

.chartcontainer
{
    width: 100%;
    height: 400px;
}

</style>