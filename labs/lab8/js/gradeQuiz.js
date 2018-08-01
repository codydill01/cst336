$(document).ready(function()
{
    $("#logoutBtn").click( function() 
    {
        window.location.href="logout.php";
        }
    );
    var score = 0;
    $("form").submit(function(event) 
    {
        event.preventDefault();
        //Get answers
        var answer1 = $("input[name='question1']").val().trim();
        var answer2 = $("input[name='question2']:checked").val();
        var answer3 = $("input[name='question3']").val().trim();
        var answer4 = $("input[name='question4']").val().trim();
        
        //Check answers
        // Question 1
        if(answer1 === "1994") 
        {
            correctAnswer($("#question1-feedback"));
        } 
        else 
        {  
            incorrectAnswer($("#question1-feedback"));
        }
        
        $("#question1-feedback").append("The answer is <strong>1994</strong>" );
        
        // Question 2
        if(answer2 === "C") 
        {   
            correctAnswer($("#question2-feedback"));
        } 
        else 
        { 
            incorrectAnswer($("#question2-feedback"));
        }
        $("#question2-feedback").append("The answer is <strong>Monte Rey</strong>" );
        
        // Question 3
        if(answer3 === "november 15 2001" || answer3 ==="11-15-2001") 
        {
            correctAnswer($("#question3-feedback"));
        } 
        else 
        {  
            incorrectAnswer($("#question3-feedback"));
        }
        
        $("#question3-feedback").append("The answer is <strong>November 15, 2001</strong>" );
        
        // Question 4
        if(answer4 === "honda civic" || answer4 ==="Honda Civic") 
        {
            correctAnswer($("#question4-feedback"));
        }
        else 
        {  
            incorrectAnswer($("#question4-feedback"));
        }
        
        $("#question4-feedback").append("The answer is <strong>Honda Civic </strong>" );
        
        $("#score").html( score );
        $("#waiting").html("<img src='img/loading.gif' alt='submitting data' />");
        $("input[type='submit']").css("display","none");
        
        //Submits and stores score, retrieves average score
        $.ajax({
            type : "post",
            url  : "submitScores.php",            
            dataType : "json",
            data : {"score" : score},            
            success : function(data){
                //console.log(data);
                $("#times").html(data.times);
                $("#average").html(data.average);
                $("#feedback").css("display","block");
                $("#waiting").html("");
                $("input[type='submit']").css("display","");
            },
            complete: function(data,status) 
            { //optional, used for debugging purposes
               // alert(status);
            }

        });//AJAX
        
    }); //formSubmit
    
    function correctAnswer(questionFeedback)
    {
        questionFeedback.html("Correct! ");
        questionFeedback.addClass("correct");
        questionFeedback.removeClass("incorrect");
        score++;
    }
    
    function incorrectAnswer(questionFeedback)
    {
        questionFeedback.html("Incorrect! ");
        questionFeedback.addClass("incorrect");
        questionFeedback.removeClass("correct");
    }
    
}); //documentReady 