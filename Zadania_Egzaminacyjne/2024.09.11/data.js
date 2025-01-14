const days = [
    "niedziela",
    "poniedziałek",
    "wtorek",
    "środa",
    "czwartek",
    "piątek",
    "sobota",
]

const showDate = () => {
    const date = new Date();
    return `Dzisiaj jest ${days[date.getDay()]}, ${date.getDate()}.${(date.getMonth()+1).toString().padStart(2, "0")}.${date.getFullYear()}, godz. ${date.getHours()}:${date.getMinutes()}`;

}

export default showDate;