
function formattaValore(valore) {
    let arrayOfchunck = []

    if (valore.length == 64) {

        arrayOfchunck[0] = valore;
        return arrayOfchunck

    } else if (valore.length < 64) {

        let chunk = valore + String.fromCharCode(128)
        let differenza = 64 - chunk.length;
        let fineImbottitura = valore.length;

        for (let index = 0; index < (differenza - 1); index++) {
            chunk = chunk + String.fromCharCode(0);
        }

        if (differenza >= 1) {
            chunk = chunk + String.fromCharCode(fineImbottitura)
        } 

        arrayOfchunck[0] = chunk;

        return arrayOfchunck

    } else if (valore.length > 64) {


        numberOfChunk = Math.ceil(valore.length / 64)

        for (let index = 0; index < numberOfChunk; index++) {

            arrayOfchunck[index] = formattaValore2(valore.slice(64 * index, 64 * (index + 1)))

        }

        return arrayOfchunck

    }

}

function formattaValore2(valore) {

    let chunk = "";

    if (valore.length != 64) {
        chunk = valore + String.fromCharCode(128)
    } else {
        chunk = valore;
    }

    differenza = 64 - chunk.length;
    fineImbottitura = valore.length.toString();

    for (let index = 0; index < (differenza - 1); index++) {
        chunk = chunk + String.fromCharCode(0);
    }

    if (differenza >= 1) {
        chunk = chunk + String.fromCharCode(fineImbottitura)
    } 

    return chunk

}

function ASCIIbitConversion(valore) {
    let primo = valore[0].charCodeAt(0) << 24;
    let secondo = valore[1].charCodeAt(0) << 16;
    let terzo = valore[2].charCodeAt(0) << 8;
    let quarto = valore[3].charCodeAt(0);

    return (primo + secondo + terzo + quarto)

}

function splitIn32Bit(valore) {
    if (valore.length != 64) {
        alert("errore di formattazione dei chunk")
    }

    let arrayOf32bitElements = []

    for (let index = 0; index < 16; index++) {

        arrayOf32bitElements[index] = ASCIIbitConversion(valore.slice(4 * index, 4 * (index + 1)));

    }

    return arrayOf32bitElements


}

function SHA1(input) {
    //stati iniziali dei SHA1
    let h0 = 0x67452301
    let h1 = 0xEFCDAB89
    let h2 = 0x98BADCFE
    let h3 = 0X10325476
    let h4 = 0xC3D2E1F0

    //fa in modo che il messaggio venga diviso e formattato in gruppi da 64 caratteri o 512 bit
    let chunkArray = formattaValore(input);

    chunkArray.forEach(chunk => {
        //suddivisione dei chunk is 16dici gruppi da 32bit ciascuino o 4 caratteri
        //questa funzione converte anche le squenze di 4 caratteri nei loro corrispettivi binari(che pero vengono visualizzati in formato decimale)
        let blocksOf32bit = splitIn32Bit(chunk);


        blocksOf32bit.forEach(bloccoDa32bit => {

            let a = h0
            let b = h1
            let c = h2
            let d = h3
            let e = h4

            let k = 0x0
            let f = 0

            // funzione di compressione
            for (let i = 0; i < 80; i++) {

                if (0 <= i <= 19) {

                    k = 0x5A82799F
                    f = d ^ (b & (c ^ d))

                } else if (20 <= i <= 39) {

                    k = 0x6ED9EBA1
                    f = b ^ c ^ d

                } else if (40 <= i <= 59) {

                    k = 0x8F1BBCDC
                    f = (b & c) | (b & d) | (c & d)

                } else if (60 <= i <= 79) {

                    k = 0xCA62C1D6
                    f = (b | c) ^ (c & d)

                }

                a = (a << 5) + f + e + k + bloccoDa32bit;
                b = h0;
                c = h1<<30;
                d = h2;
                e = h3;

                h0 = (h0 + a) & 0xFFFFFFFF;
                h1 = (h1 + b) & 0xFFFFFFFF;
                h2 = (h2 + c) & 0xFFFFFFFF;
                h3 = (h3 + d) & 0xFFFFFFFF;
                h4 = (h4 + e) & 0xFFFFFFFF;

            }
        })
    });

    h0 = h0.toString(16)
    h1 = h1.toString(16)
    h2 = h2.toString(16)
    h3 = h3.toString(16)
    h4 = h4.toString(16)
    

    if(h0[0] == "-"){
        h0 = h0.substring(1)
    }

    if(h1[0] == "-"){
        h1 = h1.substring(1)
    }

    if(h2[0] == "-"){
        h2 = h2.substring(1)
    }

    if(h3[0] == "-"){
        h3 = h3.substring(1)
    }

    if(h4[0] == "-"){
        h4 = h4.substring(1)
    }



    let hash = h0 + h1 + h2 + h3 + h4

    return hash;
}

export {SHA1};