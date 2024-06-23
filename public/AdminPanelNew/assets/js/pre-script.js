// Get time Ago Function
function timeAgo(datetime) {
  const currentDate = new Date();
  const providedDate = new Date(datetime);
  const timeDifference = currentDate - providedDate;
  const seconds = Math.floor(timeDifference / 1000);
  const minutes = Math.floor(seconds / 60);
  const hours = Math.floor(minutes / 60);

  if (hours > 0) {
    return hours === 1 ? "1 hour ago" : `${hours} hours ago`;
  } else if (minutes > 0) {
    return minutes === 1 ? "1 minute ago" : `${minutes} minutes ago`;
  } else {
    return seconds <= 1 ? "just now" : `${seconds} seconds ago`;
  }
}