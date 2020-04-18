function biodata(name, age) {
    myObj = {
      "name": name,
      "age": age,
      "address": "Jl. Matraman Raya 132, Kelurahan Kebon Manggis, Kecamatan Matraman",
      "hobbies ": "Gaming",
      "is_married": false,
      "list_school": [{
          "name": "SDS BPS&K Cipinang",
          "year_in": 2001,
          "year_out": 2005
        },
        {
          "name": "SDN 03 Kebon Manggis",
          "year_in": 2005,
          "year_out": 2007
        },
        {
          "name": "SMPN 7 Jakarta",
          "year_in": 2007,
          "year_out": 2010
        },
        {
          "name": "SMAN 22 Jakarta",
          "year_in": 2010,
          "year_out": 2013
        },
        {
          "name": "Universitas Jenderal Soedirman",
          "year_in": 2013,
          "year_out": 2019
        },
      ],
      "skills": [{
          "skill_name": "HTML",
          "level": "advanced"
        },
        {
          "skill_name": "CSS",
          "level": "advanced"
        },
        {
          "skill_name": "Bootstrap",
          "level": "beginner"
        },
        {
          "skill_name": "JS",
          "level": "beginner"
        },
        {
          "skill_name": "PHP",
          "level": "beginner"
        },
        {
          "skill_name": "MySQL",
          "level": "beginner"
        },
        {
          "skill_name": "Python",
          "level": "beginner"
        },
        {
          "skill_name": "Adobe Illustrator",
          "level": "advanced"
        },
        {
          "skill_name": "Adobe XD",
          "level": "advanced"
        },
        {
          "skill_name": "Adobe Photoshop",
          "level": "beginner"
        },
        {
          "skill_name": "Adobe After Effects",
          "level": "beginner"
        }
      ],
      "interest_in_coding": true
    }
  
    return myObj;
  }
  
  console.log(biodata("Faris Ramadhan", 25));