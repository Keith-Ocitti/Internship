let nums1=[1,7,5,11];
let nums2=[10,4,6];
let finalArray=[...nums1,...nums2]
finalArray.sort(function(a,b){
    return a-b;
});
let mylength = finalArray.length; 
if(mylength%2 === 0){
    const mymedian = (finalArray[(mylength/2)-1] + finalArray[(mylength/2)])/2;
}
else{
    const mymedian = finalArray[Math.ceil(mylength/2)-1]
    
}


