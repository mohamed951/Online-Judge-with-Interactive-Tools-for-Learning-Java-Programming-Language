# Online Judge with Interactive Tools for Learning Java Programming Language

Web application that uses an open source online judge and interactive tool for learning Java Programming Language.

## Ways of learning programming that is implemented in our application:

## **• Blockly:**

[Blockly](https://developers.google.com/blockly) is a client-side JavaScript library for creating visual block
programming languages and editors. It is a project of Google and is opensource
. It typically runs in a web browser, and visually resembles Scratch.
Blockly uses visual blocks that link together to make writing code easier,
and can generate JavaScript, Python, PHP or Dart code. It can also be
customized to generate code in any textual computer language.

### **▪ Custom Blocks (Blockly In Java):**

We built a great number of blocks includes most Java syntaxes for
beginner and we generate its Java code translation so when the student
start links the java blocks together, he will see the executable code of
java next to his blocks, it will encourage him to code using blocks
instead of being afraid of syntax error at the beginning of learning
Java.

## **• Games:**

![alt text](https://github.com/mohamed951/Online-Judge-with-Interactive-Tools-for-Learning-Java-Programming-Language/blob/master/Web%20Interface/img/howto/sc6.png)

The students drag and connect the ‘Blocks’ (hence ‘Blockly’), which are
basically pre-programmed pieces of code, to set the path of their
character. Once you think you’ve planned out the program correctly
you press ‘Run’, and the site will execute your program.
Games are a way to qualify the student to understand the programming
Helps to understand the constants and fundamentals of programming by
having aproblem.

## **• Text Problem Solved by Blockly:**

![alt text](https://github.com/mohamed951/Online-Judge-with-Interactive-Tools-for-Learning-Java-Programming-Language/blob/master/Web%20Interface/img/howto/sc1.png)

Problem as a text statement the student should read it and try to find the idea of
the solution then solve it by pick up Java blockly blocks and link it together while
seeing the translation of his blocks as an executable Java code, finally the student
submit his solution and the judge take his code and run it using JDK passing some
test cases and compare the output of code with the correct output then return the
result to the student which can be Accepted ,Wrong Answer ,Time Limit
Exceed..,etc.

## **• Text Problem:**

![alt text](https://github.com/mohamed951/Online-Judge-with-Interactive-Tools-for-Learning-Java-Programming-Language/blob/master/Web%20Interface/img/howto/sc3.png)

Same as Text Problem Solved by Blockly, but the student should write his own
code instead of picking up blocks that generate the intended code

## **• Expect The output of the code:**

![alt text](https://github.com/mohamed951/Online-Judge-with-Interactive-Tools-for-Learning-Java-Programming-Language/blob/master/Web%20Interface/img/howto/sc2.png)

In this problem the student will have a correct code and should trace it and expect
the output should the code produce.

## **• Find the Error in the code:**
We provide problems that's consist of a code has syntax error and the user should identify all error in limited number
of tries.

![alt text](https://github.com/mohamed951/Online-Judge-with-Interactive-Tools-for-Learning-Java-Programming-Language/blob/master/Web%20Interface/img/howto/sc4.png)

## **• Tutorials:**

![alt text](https://github.com/mohamed951/Online-Judge-with-Interactive-Tools-for-Learning-Java-Programming-Language/blob/master/Web%20Interface/img/howto/sc5.png)

Tutorial prepared for the beginners to help them understand the basic to
advanced concepts related to Java Programming language before start
practicing each topic.

## **• Aurora (Open Source Online Judge):**

[Aurora online judge](https://github.com/pushkar8723/Aurora) Provide only a Text Problems Solved By Codes.
We integrate our new probelms which is Consist of: Games, Problem Text solved
by blockly, Problem of Find Error and Expect the output of codes, With
Aurora online judge.

## **▪ Adding and Updating Features of Aurora**

### **We add Some features to the web application includes:**
  - Java Tutorial and Adding New Tutorial
  - Professor can add all kind of problem
  - Adding problem text solved by code or blockly
  - Adding Finding Errors of code problem
  - Adding Expect the Output problem

### **We update Some features to the web application includes:**

####  Professors have ability to:
      ▪ Add students to groups
      ▪ Create contest to specific group
####  Update the Judge:
      The Existing Judge Technique judges the submitted code in one run, it enforced the students to add loops in 
      their codes to make it run on all test cases and produce the output which the judge takes to decide the result
      of this submission using the correct output stored in the databases added by professor when he adds a single 
      file contain the output of all test cases according to add new problem.This technique will make students 
      especially the beginners confused, so we update this technique making judge test all the test cases without 
      enforce the student to add loop to run all the test cases.

## Setup Guide
Setup Aurora Online Judge using the [Setup Guide](https://github.com/pushkar8723/Aurora/wiki/Setup-Guide) and [FAQ](https://github.com/pushkar8723/Aurora/wiki/FAQ) Then replace Web Interface files,Judge.py,Database With ours.
