const CourseCard = (props) => {
  const { image, name, duration} = props.cour;

  return (
    <div className="single__course__item">
      <div className="course__img">
        <img src={'/Courses image/'+image} alt="" className="w-100" />
      </div>

      <div className="course__details">
        <h6 className="course__title mb-4">{name}</h6>

        <div className=" d-flex justify-content-between align-items-center">
          <p className="lesson d-flex align-items-center gap-1">
            <i class="ri-book-open-line"></i> {duration} 
          </p>

          {/* <p className="students d-flex align-items-center gap-1">
            <i class="ri-user-line"></i> {students}K
          </p> */}
        </div>

        <div className=" d-flex justify-content-between align-items-center">
          {/* <p className="rating d-flex align-items-center gap-1">
            <i class="ri-star-fill"></i> {rating}K
          </p> */}

          <p className="enroll d-flex align-items-center gap-1">
            <a href="#"> Enroll Now</a>
          </p>
        </div>
      </div>
    </div>
  );
};

export default CourseCard;
