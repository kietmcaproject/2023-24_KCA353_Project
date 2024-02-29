let tl = gsap.timeline({default: {duration: 0.2}});
tl 
    .from("nav",{opacity:0, y:10})
    .from(".main-title", {opacity:0, y:10})
    .from('.dashborad-title', {opacity:0, y:8})
    .from(".budgetSection", {opacity:0, y:10})
    .from(".income-expense-cards", {opacity:0, y:10})
    .from(".addExpense", {opacity:0, y:10})
    .from(".expenseList", {opacity:0, y:10})