function QRCodeGen(seller, vatRegistration){


    this.seller = seller,
    this.vatRegistration = vatRegistration,
    this.timeStamp="",
    this.invoiceTotal="",
    this.vatTotal="",
    this.xmlHash="",
    this.ECDASignature="",
    this.ECDAPublic="",
    this.ECDACrypto="",
    this.qrCodeGenerate = function(id){
        let qrcode = new QRCode(document.getElementById(id))
        qrcode.makeCode(qrCodeBase64)
    }  
    



    var getTVLforValue = function(tagNum, tagValue){

        if(tagValue.length == ""){
            return ""
        }

        let tagbuf = new Buffer.from([tagNum], 'utf8');
        tagValueLenBuf = new Buffer.from([tagValue.length], 'utf8');
        let tagValuebuf = new Buffer.from([tagValue], 'utf8');
        let bufArray = [tagbuf,tagValueLenBuf,tagValuebuf];
        return new Buffer.concat(bufArray);

    }
    var sellerNameBuff = getTVLforValue("1", this.seller)
    var vatRegistrationBuff = getTVLforValue("2", this.vatRegistration)
    var timeStampBuff = getTVLforValue("3", this.timeStamp )
    var invoiceTotalBuff = getTVLforValue("4", this.invoiceTotal)
    var vatTotalBuff = getTVLforValue("5", this.vatTotal)
    var xmlHashBuff = getTVLforValue("6", this.xmlHash)
    var ECDASignatureBuff = getTVLforValue("7", this.ECDASignature)
    var ECDAPublicBuff = getTVLforValue("8", this.ECDAPublic)
    var ECDACryptoBuff = getTVLforValue("9", this.ECDACrypto)

    var tagsbufsArray = [sellerNameBuff,vatRegistrationBuff,timeStampBuff,invoiceTotalBuff,vatTotalBuff,xmlHashBuff,ECDASignatureBuff,ECDAPublicBuff,ECDACryptoBuff]

    var qrCodeBuff = new Buffer.concat(tagsbufsArray)
    var qrCodeBase64 = qrCodeBuff.toString('base64')
}

var qr = new QRCodeGen("adnan","12321")


