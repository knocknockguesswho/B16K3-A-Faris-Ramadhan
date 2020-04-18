function divideAndSort(num) {
    return + num
        .toString()
        .split('0')
        .map(a => Array.from(a).sort().join(''))
        .join('');
}

console.log(divideAndSort(5956560159466056));