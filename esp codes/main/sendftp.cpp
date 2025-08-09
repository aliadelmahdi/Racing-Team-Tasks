#include "SendFTP.h"
#include <string.h> // for strcpy

SendFTP::SendFTP(const char* server,
                 const char* user,
                 const char* password,
                 const char* path,
                 const char* filename)
    : ftp(ftpServer, ftpUser, ftpPassword, 5000, 2) // pass char* refs to ESP32_FTPClient
{
    strcpy(ftpServer, server);
    strcpy(ftpUser, user);
    strcpy(ftpPassword, password);
    strcpy(ftpPath, path);
    strcpy(ftpFilename, filename);
}

void SendFTP::uploadToFTP(const String& data) {
    ftp.OpenConnection();
    ftp.ChangeWorkDir(ftpPath);
    ftp.InitFile("Type I");
    ftp.NewFile(ftpFilename);
    ftp.Write(data.c_str());
    ftp.CloseFile();
    ftp.CloseConnection();
    Serial.println("Uploaded JSON to FTP");
}
