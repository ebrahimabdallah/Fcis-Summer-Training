//strings
var firstname ="ahmed2020"
var lastname ="belal"
var name = firstname+lastname
console.log(name.length);
console.log(name.indexOf("m"));
console.log(name.includes("z"));
console.log(name.replace("ahmed","Mohamed"));

//array
var student = ["mohamed","belal"];
var play = ["football","swimming"];
console.log(student[2]=30);
console.log(student.push("Egypt"));
console.log(student.unshift("Egypt"));
console.log(student.splice(3,0,88,77,99));
console.log(student.concat(play));
console.log(student.concat(play).reverse());

//sorted array
var numbers = [10,20,30,40];
console.log(Math.max.apply(null,numbers));
console.log(Math.min.apply(null,numbers));
console.log(numbers.sort(function(num1,num2){
    return num1 - num2
}))
console.log(numbers.sort(function(num1,num2){
    return num2 - num1
}))