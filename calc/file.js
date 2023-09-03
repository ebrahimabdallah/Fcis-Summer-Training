function sum(sum1,sum2 ,sum3 ,sum4){
    return sum1+ sum2+ sum3+ sum4
}
let result = sum(1,2,3,4)
console.log(result);
//
function concatstr(str1,str2){
    console.log(str1.concat(str2));
}
concatstr("mohamed ","ahmed");
//
function search(str,char){
    return str.indexOf(char)
}
let position1 = search("mohamed" , "o")
console.log(position1)

let position2 = search("ahmed" , "zzz")
console.log(position2)
//
function concatstr(str1,str2 ,str3 ,str4){
    console.log(str1.concat(str2,str3,str4));
}
concatstr("welcome ","Mr ","mohmed ","ahmed")
//strings
var str ="welcome mr ahmed"
console.log(str.length);
console.log(str.indexOf("ahmed"));
console.log(str.slice(11));
console.log(str.substr(11));
console.log(str.charAt(11));
console.log(str.replace("ahmed","Mohamed"));
console.log(str.toLocaleUpperCase());
console.log(str.includes("mona"));
console.log(str.trim());
//numbers
var num = "10.87654"
console.log(Number(num));
let int = parseInt(num);
console.log(Number.isInteger(int));
console.log(parseFloat(num));
console.log(Number(num).toFixed());
console.log(Number(num).toFixed(1));