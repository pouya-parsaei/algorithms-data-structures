class HashTable {
    constructor(size) {
        this.data = new Array(size);
    }

    _hash(key) {
        let hash = 0;
        for (let i = 0; i < key.length; i++) {
            hash = (hash + key.charCodeAt(i) * i) % this.data.length
        }
        return hash;
    }

    set(key, value) {
        let address = this._hash(key);

        if (!this.data[address]) {
            this.data[address] = [];
        }

        this.data[address].push([key, value]);
    }

    get(key) {
        const address = this._hash(key);
        const currentBucket = this.data[address];

        if (currentBucket) {
            for (let i = 0; i < currentBucket.length; i++) {
                if (currentBucket[i][0] === key) {
                    return currentBucket[i][1];
                }
            }
        }

        return undefined;
    }

    keys(){
        let arrayKeys = [];

        for(let i = 0; i < this.data.length; i++){
            if(this.data[i]){
                arrayKeys.push(this.data[i][0][0])
            }
        }

        return arrayKeys;
    }

    values(){
        let arrayValues = [];

        for(let i = 0; i < this.data.length; i++){
            if(this.data[i]){
                arrayValues.push(this.data[i][0][1])
            }
        }

        return arrayValues;
    }

    keys2() {
        if (!this.data.length) {
            return undefined
        }
        let result = []
        // loop through all the elements
        for (let i = 0; i < this.data.length; i++) {
            // if it's not an empty memory cell
            if (this.data[i] && this.data[i].length) {
                // but also loop through all the potential collisions
                if (this.data.length > 1) {
                    for (let j = 0; j < this.data[i].length; j++) {
                        result.push(this.data[i][j][0])
                    }
                } else {
                    result.push(this.data[i][0])
                }
            }
        }
        return result;
    }
}

const myHashTable = new HashTable(50);
myHashTable.set('grapes', 10000)
myHashTable.set('apples', 9)
// console.log(myHashTable.get('grapes'))
// console.log(myHashTable.get('apples'))
console.log(myHashTable.keys());
console.log(myHashTable.values());
console.log(myHashTable.keys2());