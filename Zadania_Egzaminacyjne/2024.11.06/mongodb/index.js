const {MongoClient} = require('mongodb');
const express = require('express');

const app = express();
const uri = "mongodb://localhost:27017/baza4pr";

const databasesList = async(client) => {
    dbList =  await client.db().admin().listDatabases();
    console.log("Bazy: ");
    dbList.databases.forEach(db => {
        console.log(` - ${db.name}`);
    });
}

const documentInsert =  async(client) => {
    let database = client.db('baza4pr');
    let obj  = {name: "Adam", surname: "Nowak",  age: 25};
    const user = await  database.collection('users').insertOne(obj);
    console.log(user);
}

const main = async() => {

    const client = new MongoClient(uri);
    try{
        const database = await client.connect();
        let db = client.db('baza4pr');
        await databasesList(client);
        const users = await db.collection('users').find();
        console.log(await users.toArray());

        await documentInsert(database);
    }catch(e){
        console.error(e);
    }finally{
        await client.close();
    }
}

main().catch(console.error);