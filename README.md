# OOP-PHP-Exercise
This exercise covers the management of grades, registrations and student success for a class of students. 

Note that this project doesn't include the notion of input in this project as it was not yet covered when doing this exercise. 

In programming terms, the object we'll be working on is the student. 

The student is characterized by the following properties: 

Name 
Address (simplified) 
Approved enrolment (yes or no) 
The list of grades obtained at the various exams (in a table) 
Grade (represented by a number 0 - failure / 1 - satisfaction / 2 - distinction / 3 - great distinction / 4 - greatest distinction) 
 

The methods (or functions) to be managed for a student are as follows: 

Create a student (construct method) with name and address only. All other properties will have default values: 
Approved registration is initially no (we're waiting for certain documents and payment, for example) 
Grade is initially -1 (no grade) 
Grade list is an empty table  
Approve student enrolment 
Assign an additional grade to a student. If the student is not in registration order, the grade will not be added. 
Assign a grade to the student based on the average obtained (if the student is not in registration order, the grade remains at -1). 
Display the student's status with all its properties in the best possible way. 
 

The main program will perform the following operations: 

Create 5 students 
Approve the enrolment of 4 of the 5 students 
There are 3 tests, so assign 3 marks to two students and 2 marks to the others. The student who is not in registration order will not have his grade recorded in the table. 
Calculate each student's grade 
Display each student's status 
 

The first + (optional if you've completed what's required), would be to display students in order of grade or average).
